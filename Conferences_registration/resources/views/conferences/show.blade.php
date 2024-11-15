<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conference Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-4">{{ $conference->name }}</h2>

                    <p><strong>Date:</strong> {{ $conference->date }}</p>
                    <p><strong>Time:</strong> {{ $conference->time }}</p>
                    <p><strong>Description:</strong> {{ $conference->description }}</p>
                    <p><strong>Address:</strong> {{ $conference->address ?? 'Not provided' }}</p>
                    <p><strong>Lecturers:</strong> {{ $conference->lecturers ?? 'Not provided' }}</p>

                    <div class="mt-4">
                        @if(auth()->user()->conferences->contains($conference->id))
                            <span class="text-black-500"><b>Already Registered</b></span>
                            
                            @if($canUnregister)
                                <form action="{{ route('conferences.unregister', $conference->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                                        Unregister
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-500 mt-4">You cannot unregister within 24 hours of the conference.</span>
                            @endif
                        @else
                            <form action="{{ route('conferences.register', $conference->id) }}" method="POST">
                                @csrf
                                <button type="submit" style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                                    Register
                                </button>
                            </form>
                        @endif
                    </div>

                    <!-- <a href="{{ route('dashboard') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800"> -->
                    <a href="{{ route('dashboard') }}" style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; display: inline-block; margin-top: 1rem;">
                        Back to Conferences List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-green-500, .bg-red-500 {
            transition: background-color 0.3s ease;
        }
        .bg-green-500:hover {
            background-color: #2d7f3e;
        }
        .bg-red-500:hover {
            background-color: #b13d3d;
        }
    </style>
</x-app-layout>
