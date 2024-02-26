@extends('layouts.base')
@section('content')
    <div style="max-width: 500px; margin: auto; background-color: #f0f0f0; padding: 20px; border-radius: 10px;">
        <h1>CREATE A DEAL</h1>
        <form action="{{ route('Deals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 5px;">Name</label>
                <input type="text" name="name" id="name" class="form-control" style="width: 100%;">
                <span style="color: red; font-size: 12px;">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="description" style="display: block; margin-bottom: 5px;">Description</label>
                <input type="text" name="description" id="description" class="form-control" style="width: 100%;">
                <span style="color: red; font-size: 12px;">
                    @error('description')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="owner" style="display: block; margin-bottom: 5px;">Owner</label>
                <input type="text" name="owner" id="owner" class="form-control" style="width: 100%;">
                <span style="color: red; font-size: 12px;">
                    @error('owner')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        <!--job title -->
        <div class="margin-bottom: 20px;">
            <label for="amount" style="display: block; margin-bottom: 5px;">Amount</label>
            <input type="text" name="amount" id="amount" class="form-control" style="width: 100%;">
            <span style="color: red; font-size: 12px;">
                @error('amount')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="margin-bottom: 20px;">
            <label for="status" style="display: block; margin-bottom: 5px;">Status</label>
            <select name="status" id="status" class="form-control" style="width: 100%;">
                <option value="{{ \App\Models\Deals::PROSPECTING }}">Prospecting</option>
                <option value="{{ \App\Models\Deals::QUALIFICATION }}">Qualification</option>
                <option value="{{ \App\Models\Deals::NEGOTIATION }}">Negotiation</option>
                <option value="{{ \App\Models\Deals::CLOSED_WON }}">Closed-won</option>
                <option value="{{ \App\Models\Deals::CLOSED_LOST }}">Closed-lost</option>
            </select>
            <span style="color: red; font-size: 12px;">
                @error('status')
                    {{ $message }}
                @enderror
            </span>
        </div>


        <div class="margin-bottom: 20px;">
            <label for="start_date" style="display: block; margin-bottom: 5px;">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" style="width: 100%;">
            <span style="color: red; font-size: 12px;">
                @error('start_date')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="margin-bottom: 20px;">
            <label for="close_date" style="display: block; margin-bottom: 5px;">Close Date</label>
            <input type="date" name="close_date" id="close_date" class="form-control" style="width: 100%;">
            <span style="color: red; font-size: 12px;">
                @error('close_date')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <button type="submit" class="btn" style="background-color: hotpink; margin-top: 10px; height:40px; width:100px; border-radius:30px; align-items:center;">Submit</button>
    </form>
@endsection
