<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Contact') }}
            </h2>
            <nav class="flex space-x-4">
                <a href="{{ route('contacts.index') }}" class="text-blue-500 hover:text-blue-700">Back to Contacts</a>
            </nav>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-4">Edit Client</h2>
                    <form action="{{ route('contacts.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $client->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="surname" class="block text-sm font-medium text-gray-700">Surname</label>
                            <input type="text" id="surname" name="surname" value="{{ old('surname', $client->surname) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div class="mb-4">
                        <button type="submit" style="padding: 8px 16px; background-color: #3b82f6; color: white; border-radius: 8px; border: none; cursor: pointer; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">
                         Update Client
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
