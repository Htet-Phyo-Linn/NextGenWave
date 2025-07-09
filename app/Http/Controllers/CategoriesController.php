<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // view categories list
    public function list()
    {
        $items = categories::orderBy('id', 'desc')->get(); // correct usage
        $count = 1;
        // $page = 'categoryList';
        // dd($items);

        return view('admin.layouts.category.list', compact('items', 'count'));
    }

    public function create(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string|max:1000', // optional description, max 1000 chars
        ]);

        // Create category with validated data
        categories::create($validatedData);

        return back()->with(['createSuccess' => 'Successfully created ...']);
    }

    public function editPage($id)
    {
        $data = categories::where('id', $id)->first();
        return view('admin.layouts.category.edit', compact('data'));
    }

    public function edit(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'id'          => 'required|exists:categories,id|integer',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Update category with validated data
        categories::where('id', $validatedData['id'])->update([
            'name'        => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('category.list')->with(['updateSuccess' => 'Successfully updated ...']);
    }

    public function delete($id)
    {
        categories::where('id', $id)->delete();
        return redirect()->route('category.list')->with(['deleteSuccess' => 'Successfully deleted ...']);
    }
}
