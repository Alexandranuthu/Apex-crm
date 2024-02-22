@extends('layouts.base')
@section('content')
    <form action="{{ route('Contacts.store') }}" method="POST" enctype="multipart/form-data">
        {{-- csrf is a middleware that protects your application
         from cross-site request forgery (CSRF) attacks. --}}
        {{-- a csrf token is a unique,
         secret token that is used to
         verify that the authenticated user
         is the one actually making the requests to the application. --}}
        {{-- a csrf attack is an attack
         that forces an end user to execute unwanted actions on a web application in which they're currently authenticated. --}}
        @csrf

        {{-- @foreach ($fillables as $field)
        <div class="form-group">
            <label for="{{ $field }}">{{ $field }}</label>
            <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control">
        </div>
    @endforeach --}}
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" class="form-control">
            <span class="text-danger">
                @error('firstname')
                    {{ $message }}
                @enderror
            </span>

        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control">
            <span class="text-danger">
                @error('lastname')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone" class="form-control">
            <span class="text-danger">
                @error('phone')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <!--job title -->
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" name="job_title" id="job_title" class="form-control">
            <span class="text-danger">
                @error('job_title')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="organisation_id">Organisation</label>
            <select name="organisation_id" id="organisation_id" class="form-control">
                <option value="">Select organization</option>
                @foreach ($organisations as $organisation)
                    <option value="{{ $organisation->id }}">{{ $organisation->name }}</option>
                @endforeach
            </select>
            <span class="text-danger">
                @error('organisation_id')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <span class="text-danger">
                @error('image')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
