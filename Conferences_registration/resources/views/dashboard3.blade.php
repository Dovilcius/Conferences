<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New Conference') }}
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
                    <h2 class="text-2xl mb-4">Create a New Conference</h2>

                    @if(session('success'))
                        <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('conferences.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Conference Name</label>
                            <input type="text" id="name" name="name" required class="mt-1 block w-full rounded-md shadow-sm">
                        </div>

                        <div class="mt-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">Conference Date</label>
                            <input type="date" id="date" name="date" required class="mt-1 block w-full rounded-md shadow-sm">
                        </div>

                        <div class="mt-4">
                            <label for="time" class="block text-sm font-medium text-gray-700">Conference Time</label>
                            <input type="time" id="time" name="time" required class="mt-1 block w-full rounded-md shadow-sm">
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Conference Description</label>
                            <textarea id="description" name="description" rows="4" required class="mt-1 block w-full rounded-md shadow-sm"></textarea>
                        </div>

                        <div class="mt-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Conference Address</label>
                            <input type="text" id="address" name="address" class="mt-1 block w-full rounded-md shadow-sm">
                        </div>

                        <div class="mt-4">
                            <label for="lecturers" class="block text-sm font-medium text-gray-700">Lecturers</label>
                            <textarea id="lecturers" name="lecturers" rows="4" class="mt-1 block w-full rounded-md shadow-sm"></textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit" style="background-color: #3182ce; color: white; padding: 12px 24px; border-radius: 0.375rem; hover: background-color: #2b6cb0;">
                                Create Conference
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
