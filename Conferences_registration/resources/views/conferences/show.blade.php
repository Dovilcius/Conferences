<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.conference_details') }}
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

                    <div class="mt-4">
                        @if(auth()->user()->conferences->contains($conference->id))
                            <span class="text-black-500"><b>{{ __('messages.already_registered') }}</b></span>
                            
                            @if($canUnregister)
                                <form action="{{ route('conferences.unregister', $conference->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                                        {{ __('messages.unregister') }}
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-500 mt-4">{{ __('messages.cannot_unregister') }}</span>
                            @endif
                        @else
                            @if($conference->date >= now()->toDateString())
                                <form action="{{ route('conferences.register', $conference->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                                        {{ __('messages.register') }}
                                    </button>
                                </form>
                            @else
                                <span class="text-red-500">Registration is closed.</span>
                            @endif
                        @endif
                    </div>

                    <a href="{{ route('dashboard') }}" style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; display: inline-block; margin-top: 1rem;">
                        {{ __('messages.back_to_list') }}
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
