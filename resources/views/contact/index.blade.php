@extends('layouts.base')
@section('content')
    {{-- use flowbite for the ui --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-300">
            <thead class="text-xs bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Contact Name
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Organization name
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($contacts->isEmpty())
                    <tr class="bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 text-center" colspan="6">
                            No contacts found.
                        </td>
                    </tr>
                @else
                    @foreach ($contacts as $contact)
                        <tr class="bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                                {{ $contact->firstname }} {{ $contact->lastname }}
                            </td>
                            <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                                {{ $contact->email }}
                            </td>
                            <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                                {{ $contact->phone }}
                            </td>
                            <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                                {{ $contact->organisation->name }}
                            </td>
                            <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                                <img src="{{ asset('images/' . $contact->image) }}" alt="{{ $contact->firstname }}"
                                    class="w-16 h-16 rounded-full">
                            </td>
                            <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                                <div style="display: inline-block;">
                                    <a href="{{ route('Contacts.edit', $contact->id) }}"
                                        style="padding: 0.5rem 1rem; background-color: #3b82f6; color: #fff; border-radius: 0.375rem; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease-in-out; text-decoration: none;"
                                        class="hover:bg-blue-600 transition duration-300 ease-in-out">
                                        Edit
                                    </a>
                                </div>
                                <div style="display: inline-block;">
                                    <form action="{{ route('Contacts.destroy', $contact->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="padding: 0.5rem 1rem; background-color: #ef4444; color: #fff; border-radius: 0.375rem; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease-in-out; border: none; cursor: pointer;"
                                            class="hover:bg-red-600 transition duration-300 ease-in-out">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <a href="{{ route('Contacts.create') }}"
        style="display: block; width: 100%; margin-top: 1rem; padding: 0.5rem 1rem; background-color: #fbbf24; color: #fff; border-radius: 0.375rem; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease-in-out; text-align: center; text-decoration: none;"
        class="hover:bg-yellow-600 transition duration-300 ease-in-out">
        Add Contact
    </a>
@endsection
