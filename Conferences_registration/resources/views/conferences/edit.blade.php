<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.edit_conference') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="border-radius: 0.5rem; box-shadow: 0 4px 30px green;">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-4">{{ __('messages.edit_conference') }}</h2>

                    <form action="{{ route('conferences.update', $conference->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_name') }}</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $conference->name) }}" required class="mt-1 block w-full rounded-md shadow-sm">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_date') }}</label>
                            <input type="date" id="date" name="date" value="{{ old('date', $conference->date) }}" required class="mt-1 block w-full rounded-md shadow-sm">
                            @error('date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="time" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_time') }}</label>
                            <input type="time" id="time" name="time" value="{{ old('time', $conference->time) }}" required class="mt-1 block w-full rounded-md shadow-sm">
                            @error('time')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_description') }}</label>
                            <textarea id="description" name="description" rows="4" required class="mt-1 block w-full rounded-md shadow-sm">{{ old('description', $conference->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_address') }}</label>
                            <input type="text" id="address" name="address" value="{{ old('address', $conference->address) }}" required class="mt-1 block w-full rounded-md shadow-sm">
                            @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="lecturers" class="block text-sm font-medium text-gray-700">{{ __('messages.conference_lecturers') }}</label>
                            <input type="text" id="lecturers" name="lecturers" value="{{ old('lecturers', $conference->lecturers) }}" required class="mt-1 block w-full rounded-md shadow-sm">
                            @error('lecturers')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" style="background-color: green; color: white; padding: 12px 24px; border-radius: 0.375rem;">
                                {{ __('messages.update_conference') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
