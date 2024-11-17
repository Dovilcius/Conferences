<x-app-layout>
    <x-slot name="header" style="background-color: black; padding-top: 20px;">
            <h2 style="color: green; font-size: 1.25rem; font-weight: 600;" class="font-semibold text-xl">
            {{ __('messages.welcome') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="border-radius: 0.5rem; box-shadow: 0 4px 30px green;">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-4">{{ __('messages.all_conferences') }}</h2>

                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('messages.name') }}
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('messages.date') }}
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('messages.description') }}
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('messages.actions') }}
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

                                    <td class="px-6 py-4 whitespace-pre-line text-sm text-gray-500">
                                        {{ $conference->description }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="{{ route('conferences.show', $conference->id) }}" class="text-green-600 hover:text-green-800">
                                            {{ __('messages.more_info') }}
                                        </a>

                                        <div class="mt-2">
                                            @if(auth()->user()->conferences->contains($conference->id))
                                                <span class="text-gray-500">{{ __('messages.already_registered') }}</span>
                                            @else
                                                <form action="{{ route('conferences.register', $conference->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="ml-4 text-green-600 hover:text-green-800">
                                                        {{ __('messages.register') }}
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
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
