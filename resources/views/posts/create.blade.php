@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="mt-8">
            <h1 class="text-2xl font-bold mb-4">Create Blog Post</h1>
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700">Content</label>
                    <textarea name="content" id="content" class="form-textarea mt-1 block w-full" required></textarea>
                </div>
                <!--Add a user dropdown to select the user who created the post-->
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700">User</label>
                    <select name="user_id" id="user_id" class="form-select mt-1 block w-full" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div class="mb-4">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create
                            Post</button>
                    </div>
            </form>
        </div>
    </div>
@endsection