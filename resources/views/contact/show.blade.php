<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
</head>
<body>
    <h1>Contact Details</h1>

    <div>
        <strong>First Name:</strong> {{ $contact->firstname }}<br>
        <strong>Last Name:</strong> {{ $contact->lastname }}<br>
        <strong>Email:</strong> {{ $contact->email }}<br>
        <strong>Phone:</strong> {{ $contact->phone }}<br>
        <strong>Job Title:</strong> {{ $contact->job_title }}<br>
        <strong>Organization:</strong> {{ $contact->organisation->name }}<br>
        @if($contact->image)
            <img src="{{ asset('images/' . $contact->image) }}" alt="Contact Image">
        @endif
    </div>

    <a href="{{ route('Contacts.index')) }}">Back to Contacts</a>
</body>
</html>
