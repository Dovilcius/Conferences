<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Conference') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-4">Edit Conference</h2>

                    <form action="{{ route('conferences.update', $conference->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Conference Name</label>
                            <input type="text" id="name" name="name" value="{{ $conference->name }}" required class="mt-1 block w-full rounded-md shadow-sm">
                        </div>

                        <div class="mt-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">Conference Date</label>
                            <input type="date" id="date" name="date" value="{{ $conference->date }}" required class="mt-1 block w-full rounded-md shadow-sm">
                        </div>

                        <div class="mt-4">
                            <label for="time" class="block text-sm font-medium text-gray-700">Conference Time</label>
                            <input type="time" id="time" name="time" value="{{ $conference->time }}" required class="mt-1 block w-full rounded-md shadow-sm">
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Conference Description</label>
                            <textarea id="description" name="description" rows="4" required class="mt-1 block w-full rounded-md shadow-sm">{{ $conference->description }}</textarea>
                        </div>

                        <div class="mt-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Conference Address</label>
                            <input type="text" id="address" name="address" value="{{ $conference->address }}" class="mt-1 block w-full rounded-md shadow-sm">
                        </div>

                        <div class="mt-4">
                            <label for="lecturers" class="block text-sm font-medium text-gray-700">Conference Lecturers</label>
                            <input type="text" id="lecturers" name="lecturers" value="{{ $conference->lecturers }}" class="mt-1 block w-full rounded-md shadow-sm">
                        </div>

                        <div class="mt-4">
                            <button type="submit" style="background-color: #3182ce; color: white; padding: 12px 24px; border-radius: 0.375rem; hover: background-color: #2b6cb0;">
                                Update Conference
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
