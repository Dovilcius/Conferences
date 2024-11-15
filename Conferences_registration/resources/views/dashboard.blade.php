{{-- dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-4">All Conferences</h2>

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
                                    Description
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

                                    <td class="px-6 py-4 whitespace-pre-line text-sm text-gray-500">
                                        {{ $conference->description }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="{{ route('conferences.show', $conference->id) }}" class="text-green-600 hover:text-green-800">
                                            More Info
                                        </a>

                                        <div class="mt-2">
                                            @if(auth()->user()->conferences->contains($conference->id))
                                                <span class="text-gray-500">Already Registered</span>
                                            @else
                                                <form action="{{ route('conferences.register', $conference->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="ml-4 text-green-600 hover:text-green-800">
                                                        Register
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
