<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>

        <nav class="flex space-x-6">
            <a href="{{ route('dashboard3') }}" class="menu-link">Add New</a>
            <a href="{{ route('conferences.index') }}" class="menu-link">Conferences</a>
            <a href="{{ route('contacts.index') }}" class="menu-link">Customers</a>
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
        color: #63b3ed; 
    }

    nav a {
        margin-right: 1.5rem;
    }
</style>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-4">Contacts List</h2>

                    <table class="min-w-full border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Name</th>
                                <th class="px-4 py-2 border">Surname</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $client->name }}</td>
                                    <td class="px-4 py-2 border">{{ $client->surname }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('contacts.edit', $client->id) }}" class="text-green-600 hover:text-green-800">Edit</a>
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