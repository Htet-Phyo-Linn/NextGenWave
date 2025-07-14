<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Courses;
use App\Models\Enrollments;
use App\Models\Lessons;
use App\Models\User;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{

    public function index(Request $request)
    {
        // Retrieve courses with category name using a join
        $query = DB::table('courses')
            ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
            ->select('courses.*', 'categories.name as category_name');

        if ($request->filled('category_id')) {
            $query->where('courses.category_id', $request->category_id);
        }
        if ($request->filled('search')) {
            $query->where('courses.title', 'like', '%' . $request->search . '%');
        }
        $courses    = $query->paginate(8)->withQueryString();
        $categories = DB::table('categories')->get();
        // dd($courses);
        return view('user.layouts.courses', compact('courses', 'categories'));
    }

    public function filter(Request $request)
    {
        // If category_id is null (i.e., "All" button clicked), fetch all courses
        if ($request->category_id === null) {
            $courses = DB::table('courses')
                ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
                ->select('courses.*', 'categories.name as category_name')
                ->paginate(8);
        } else {
            // Otherwise, filter by the selected category_id
            $courses = DB::table('courses')
                ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
                ->select('courses.*', 'categories.name as category_name')
                ->where('courses.category_id', $request->category_id)
                ->paginate(8); // Paginate the results
        }

        // Fetch all categories for the filter buttons
        $categories = DB::table('categories')->get();
        // dd($courses);
        // Return the filtered courses (partial view) and categories
        return view('user.layouts.partials.courses_card', compact('courses', 'categories'));
    }

    public function course_detail($course_id)
    {
        // Fetch the course details based on the course_id
        $course = Courses::where('id', $course_id)->first();

        // Fetch the category details based on the course's category_id
        $category = Categories::where('id', $course->category_id)->first();

        // Fetch enrollment details where the course_id matches
        $enrollments = Enrollments::where('course_id', $course_id)->get();

        // If you need the count of enrollments or specific details, add logic here
        $enrollmentCount = $enrollments->count();

        // Prepare all data to be passed to the view
        $data = [
            'course'          => $course,
            'category'        => $category,
            'enrollments'     => $enrollments,
            'enrollmentCount' => $enrollmentCount,
        ];

        // dd($data);
        return view('user.layouts.courses_detail', $data);
    }

    // public function course_lessons($course_id) {
    //     $user_id = auth()->id();

    //     // Fetch the user's enrollment record for the course
    //     $enrollment = Enrollments::where('course_id', $course_id)
    //                             ->where('user_id', $user_id)
    //                             ->first();

    //     // Check if the user is enrolled and the status is 'active' or 'complete'
    //     if (!$enrollment || !in_array($enrollment->status, ['active', 'complete'])) {
    //         return view('user.layouts.errors.enroll_error');
    //     }

    //     $course = Courses::where('id', $course_id)->first();
    //     $lessons = Lessons::where('course_id', $course_id)->get();

    //     // Prepare data for the view
    //     $data = [
    //         'course' => $course,
    //         'lessons' => $lessons,
    //     ];
    //     dd($data);
    //     return view('user.layouts.course_lessons', $data);
    // }

    public function course_lessons($course_id)
    {
        // Simulate the current user ID (or retrieve from auth session if using Auth)
        $user_id = auth()->id();

        // Fetch the user's enrollment record for the course
        $enrollment = Enrollments::where('course_id', $course_id)
            ->where('user_id', $user_id)
            ->first();

        // Check if the user is enrolled and the status is 'active' or 'complete'
        if (! $enrollment || ! in_array($enrollment->status, ['active', 'complete'])) {
                                                    // Redirect to an error page if not enrolled or status is 'pending' or 'cancelled'
            return view('errors.enrollment_error'); // Create a view at resources/views/errors/enrollment_error.blade.php
        }

        // Fetch the course details
        $course = Courses::find($course_id);

        // Fetch all lessons for the course
        $lessons = Lessons::where('course_id', $course_id)->get();

        // Fetch all videos for each lesson
        $videos = [];
        foreach ($lessons as $lesson) {
            $lessonVideos        = Videos::where('lesson_id', $lesson->id)->get();
            $videos[$lesson->id] = $lessonVideos;
        }

        // Prepare data for the view
        $data = [
            'course'  => $course,
            'lessons' => $lessons,
            'videos'  => $videos, // Pass videos data
        ];

        return view('user.layouts.course_lessons', $data);
    }

    // admin part

    // view courses list
    public function list()
    {
        $items = Courses::select('courses.*',
            'courses.title as course_title',
            'users.name as instructor_name',
            'categories.name as category_name')
            ->join('users', 'courses.instructor_id', '=', 'users.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->get();

        $categories = categories::all();

        $count = 1;
        return view('admin.layouts.course.list', compact('items', 'categories', 'count'));
    }

    public function create(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'instructor_id' => 'required|exists:users,id|integer',
            'category'      => 'required|exists:categories,id|integer',
            'course_title'  => 'required|string|max:255',
            'description'   => 'string|max:500',
            'price'         => 'required|numeric|min:0',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        // Prepare the data for saving
        $data = [
            'instructor_id' => (int) $request->instructor_id,
            'category_id'   => (int) $request->category,
            'title'         => $request->course_title,
            'description'   => $request->description,
            'price'         => (int) $request->price,
            'image'         => $request->image,
        ];

        if ($request->hasFile('image')) {
            $imagePath     = $request->file('image')->store('images/courses', 'public');
            $data['image'] = $imagePath;
        }

        // Verify instructor existence
        $instructorExists = User::where('id', (int) $request->instructor_id)->exists();
        if (! $instructorExists) {
            return back()->withErrors(['instructor_id' => 'Instructor ID not found']);
        }
        // Create the course record
        Courses::create($data);

        // Redirect with success message
        return back()->with(['createSuccess' => 'Course successfully created ...']);
    }

    public function editPage($id)
    {
        $data = courses::where('id', $id)->first();

        $categories = Categories::all();
        $count      = 1;
        return view('admin.layouts.course.edit', compact('data', 'categories', 'count'));
    }

    public function edit(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'instructor_id' => 'required|exists:users,id|integer',
            'category'      => 'required|exists:categories,id|integer',
            'title'         => 'required|string|max:255',
            // 'description' => 'string|max:500',
            'price'         => 'required|numeric|min:0',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        // Find the instructor
        $user = User::find($request->instructor_id);
        if (! $user) {
            return redirect()->route('course.list')
                ->with('instructor_id_error', 'Instructor ID not found')
                ->withInput();
        }

        // Find the course to update
        $course = Courses::find($request->id);
        if (! $course) {
            return redirect()->route('course.list')
                ->with('course_id_error', 'Course not found')
                ->withInput();
        }

        // Prepare the data for updating
        $data = [
            'instructor_id' => (int) $request->instructor_id,
            'category_id'   => (int) $request->category,
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => (int) $request->price,
        ];

        // Check if a new image is uploaded and store it
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/courses', 'public');
            $course->update(['image' => $imagePath]);
        }

        // Update the course with new data
        $course->update($data);

        // Redirect with success message
        return redirect()->route('course.list')->with(['updateSuccess' => 'Course updated successfully.']);
    }

    public function delete($id)
    {
        courses::where('id', $id)->delete();
        return redirect()->route('course.list')->with(['deleteSuccess' => 'Course successfully deleted ...']);
    }

}
