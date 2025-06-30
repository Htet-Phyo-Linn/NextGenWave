@extends('user.master')

@section('styles')
    <style>
        .error_container {
            height: 100vh;
            /* Corrected from 'high' to 'height' */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container error_container">
        <div>
            <h1>Access Denied</h1>
            <p>You are not enrolled in this course, or your enrollment is pending/cancelled.</p>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
