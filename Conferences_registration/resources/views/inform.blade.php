<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.conference_information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="border-radius: 0.5rem; box-shadow: 0 4px 30px green;">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-4">{{ $conference->name }}</h2>
                    <p><strong>{{ __('messages.date') }}:</strong> {{ $conference->date }}</p>
                    <p><strong>{{ __('messages.time') }}:</strong> {{ $conference->time }}</p>
                    <p><strong>{{ __('messages.description') }}:</strong> {{ $conference->description }}</p>
                    <p><strong>{{ __('messages.address') }}:</strong> {{ $conference->address ?? __('messages.not_provided') }}</p>
                    <p><strong>{{ __('messages.lecturers') }}:</strong> {{ $conference->lecturers ?? __('messages.not_provided') }}</p>

                    <hr>
                    <h3 class="text-lg font-semibold mt-4">{{ __('messages.registered_participants') }}</h3>

                    @if($conference->participants->isEmpty())
                        <p>{{ __('messages.no_participants') }}</p>
                    @else
                        <ul class="list-disc ml-6">
                            @foreach($conference->participants as $participant)
                                <li>{{ $participant->name }} ({{ $participant->email }})</li>
                            @endforeach
                        </ul>
                        <br>
                    @endif
                    
                    <a href="{{ route('dashboard2') }}" style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                        {{ __('messages.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
