<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Devices') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Endpoint Devices List</h2>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 bg-white rounded-lg shadow overflow-hidden">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">OS</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Last Seen</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            @foreach($devices->items as $device)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-3 py-4">
                                    <span class="inline-block px-2 py-1 text-xs font-medium rounded
                                    {{ $device->status === 'Connected' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $device->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $device->id }}</td>
                                <td class="px-6 py-4">{{ $device->name }}</td>
                                <td class="px-6 py-4">{{ $device->OS }}</td>
                                <td class="px-6 py-4">{{ $device->user }}</td>
                                <td class="px-6 py-4">{{ $device->last_seen }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>