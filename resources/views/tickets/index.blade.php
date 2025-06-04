<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Tickets') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Lista de Tickets</h2>
                        <a href="{{ route('tickets.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded shadow">+ Add ticket</a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 bg-white rounded-lg shadow overflow-hidden">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Ticket ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            @foreach($tickets as $ticket)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">{{ $ticket->id }}</td>
                                <td class="px-6 py-4">{{ $ticket->title }}</td>
                                <td class="px-6 py-4">{{ $ticket->description }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-2 py-1 text-xs font-medium rounded
                    {{ $ticket->status === 'open' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $ticket->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $ticket->created_at }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('tickets.edit', $ticket->id) }}"
                                        class="text-blue-600 hover:underline font-medium">Edit</a>
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