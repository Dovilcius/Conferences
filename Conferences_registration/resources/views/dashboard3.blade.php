<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('messages.add_new_conference') }}
            </h2>
            <nav class="flex space-x-6">
                <a href="{{ route('dashboard3') }}" class="menu-link">{{ __('messages.add_new_conference') }}</a>
                <a href="{{ route('conferences.index') }}" class="menu-link">{{ __('messages.conferences') }}</a>
                <a href="{{ route('contacts.index') }}" class="menu-link">{{ __('messages.customers') }}</a>
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
            color: green;
        }

        nav a {
            margin-right: 1.5rem;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="border-radius: 0.5rem; box-shadow: 0 4px 30px green;">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-4">{{ __('messages.create_new_conference') }}</h2>

                    @if(session('success'))
                        <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('conferences.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_name') }}</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="mt-1 block w-full rounded-md shadow-sm">
                            @error('name')
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_date') }}</label>
                            <input type="date" id="date" name="date" value="{{ old('date') }}" required class="mt-1 block w-full rounded-md shadow-sm">
                            @error('date')
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="time" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_time') }}</label>
                            <input type="time" id="time" name="time" value="{{ old('time') }}" required class="mt-1 block w-full rounded-md shadow-sm">
                            @error('time')
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_description') }}</label>
                            <textarea id="description" name="description" rows="4" required class="mt-1 block w-full rounded-md shadow-sm">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_address') }}</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}" required class="mt-1 block w-full rounded-md shadow-sm">
                            @error('address')
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="lecturers" class="block text-sm font-medium text-gray-700">{{ __('messages.lecturers') }}</label>
                            <textarea id="lecturers" name="lecturers" rows="4" required class="mt-1 block w-full rounded-md shadow-sm">{{ old('lecturers') }}</textarea>
                            @error('lecturers')
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" style="background-color: green; color: white; padding: 12px 24px; border-radius: 0.375rem;">
                                {{ __('messages.create_conference') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
