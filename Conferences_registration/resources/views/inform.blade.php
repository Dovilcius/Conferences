<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conference Information') }}
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

                    <hr>
                    <h3 class="text-lg font-semibold mt-4">Registered Participants</h3>

                    @if($conference->participants->isEmpty())
                        <p>No participants have registered for this conference yet.</p>
                    @else
                        <ul class="list-disc ml-6">
                            @foreach($conference->participants as $participant)
                                <li>{{ $participant->name }} ({{ $participant->email }})</li>
                            @endforeach
                        </ul>
                        <br>
                    @endif
                    
                   <!-- <a href="{{ route('dashboard2') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800"> -->
                    <a href="{{ route('dashboard2') }}" style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                        Back to Conferences List
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

