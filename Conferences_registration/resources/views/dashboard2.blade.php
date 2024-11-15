<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conferences') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">

                @if(auth()->user()->role === 'admin')
                    <h1>Welcome admin</h1>
                @elseif(auth()->user()->role === 'worker')
                <div class="mt-8 flex flex-col lg:flex-row lg:space-x-8">

                    <div class="flex-1 mb-8 lg:mb-0">
                        <h2 class="text-2xl font-semibold mb-4">Upcoming Conferences</h2>
                        <table class="w-full table-auto border border-gray-300 rounded-lg">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left border-b">Name</th>
                                    <th class="px-4 py-2 text-left border-b">Date</th>
                                    <th class="px-4 py-2 text-left border-b">Description</th>
                                    <th class="px-4 py-2 border-b">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($upcomingConferences as $conference)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $conference->name }}</td>
                                        <td class="border px-4 py-2">{{ $conference->date }}</td>
                                        <td class="border px-4 py-2">{{ Str::limit($conference->description, 50) }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            <a href="{{ route('conferences.inform', $conference->id) }}"
                                               style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                                               More Info
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex-1">
                        <h2 class="text-2xl font-semibold mb-4">Past Conferences</h2>
                        <table class="w-full table-auto border border-gray-300 rounded-lg">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left border-b">Name</th>
                                    <th class="px-4 py-2 text-left border-b">Date</th>
                                    <th class="px-4 py-2 text-left border-b">Description</th>
                                    <th class="px-4 py-2 border-b">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pastConferences as $conference)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $conference->name }}</td>
                                        <td class="border px-4 py-2">{{ $conference->date }}</td>
                                        <td class="border px-4 py-2">{{ Str::limit($conference->description, 50) }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            <a href="{{ route('conferences.inform', $conference->id) }}"
                                               style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                                               More Info
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                @else
                    <h1>Welcome client</h1>
                @endif
</x-app-layout>
