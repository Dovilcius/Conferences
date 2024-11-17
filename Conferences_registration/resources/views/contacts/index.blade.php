<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('messages.user_management') }}
            </h2>

            <nav class="flex space-x-6">
                <a href="{{ route('dashboard3') }}" class="menu-link">{{ __('messages.add_new') }}</a>
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

                    {{-- Clients List --}}
                    <h2 class="text-2xl mb-4">{{ __('messages.clients_list') }}</h2>
                    <table class="min-w-full border-collapse border border-gray-200 mb-6">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">{{ __('messages.name') }}</th>
                                <th class="px-4 py-2 border">{{ __('messages.surname') }}</th>
                                <th class="px-4 py-2 border">{{ __('messages.email') }}</th>
                                <th class="px-4 py-2 border">{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $client->name }}</td>
                                    <td class="px-4 py-2 border">{{ $client->surname }}</td>
                                    <td class="px-4 py-2 border">{{ $client->email }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('contacts.edit', $client->id) }}" class="text-green-600 hover:text-green-800">{{ __('messages.edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Workers List --}}
                    <h2 class="text-2xl mb-4">{{ __('messages.workers_list') }}</h2>
                    <table class="min-w-full border-collapse border border-gray-200 mb-6">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">{{ __('messages.name') }}</th>
                                <th class="px-4 py-2 border">{{ __('messages.surname') }}</th>
                                <th class="px-4 py-2 border">{{ __('messages.email') }}</th>
                                <th class="px-4 py-2 border">{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workers as $worker)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $worker->name }}</td>
                                    <td class="px-4 py-2 border">{{ $worker->surname }}</td>
                                    <td class="px-4 py-2 border">{{ $worker->email }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('contacts.edit', $worker->id) }}" class="text-green-600 hover:text-green-800">{{ __('messages.edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Admins List --}}
                    <h2 class="text-2xl mb-4">{{ __('messages.admins_list') }}</h2>
                    <table class="min-w-full border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">{{ __('messages.name') }}</th>
                                <th class="px-4 py-2 border">{{ __('messages.surname') }}</th>
                                <th class="px-4 py-2 border">{{ __('messages.email') }}</th>
                                <th class="px-4 py-2 border">{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $admin->name }}</td>
                                    <td class="px-4 py-2 border">{{ $admin->surname }}</td>
                                    <td class="px-4 py-2 border">{{ $admin->email }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('contacts.edit', $admin->id) }}" class="text-green-600 hover:text-green-800">{{ __('messages.edit') }}</a>
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
