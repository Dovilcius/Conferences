<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Conferences') }}
            </h2>

            <nav class="flex space-x-6">
                <a href="{{ route('dashboard3') }}" class="menu-link">Add New</a>
                <a href="{{ route('conferences.index') }}" class="menu-link">Conferences</a>
                <a href="{{ route('contacts.index') }}" class="menu-link">Customers</a>
            </nav>
        </div>
    </x-slot>

    <style>
        .menu-link {
            color: black;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .menu-link:hover {
            color: #63b3ed;
        }

        nav a {
            margin-right: 1.5rem;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-4">All Conferences</h2>

                    @if(session('success'))
                        <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-error mb-4 p-4 bg-red-100 text-red-700 rounded-md">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Time
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Address
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Lecturers
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($conferences as $conference)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $conference->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $conference->date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $conference->time }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-pre-line text-sm text-gray-500">
                                        {{ $conference->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-pre-line text-sm text-gray-500">
                                        {{ $conference->address }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-pre-line text-sm text-gray-500">
                                        {{ $conference->lecturers }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="{{ route('conferences.edit', $conference->id) }}" class="text-green-600 hover:text-green-800">
                                            Edit
                                        </a>
                                        <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
