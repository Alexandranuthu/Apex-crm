@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
            <p class="text-gray-600">{{ $post->content }}</p>
            <!--add user name-->
            {{-- <p class="text-gray-600 mt-4">User: {{ $post->user->name }}</p> --}}
            <p class="text-gray-600 mt-4">Created at: {{ $post->created_at }}</p>
            <p class="text-gray-600">Updated at: {{ $post->updated_at }}</p>
        </div>
        <a href="{{ route('post.edit', $post->id) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Edit</a>
    </div>
@endsection