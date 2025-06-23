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
                        <h2 class="text-2xl font-bold text-gray-800">Endpoint Properties</h2>
                    </div>
                    <div class="overflow-hidden rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200 bg-white">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">OS</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">User</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Last Seen</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">{{ $device->id }}</td>
                                    <td class="px-6 py-4">{{ $device->name }}</td>
                                    <td class="px-6 py-4">{{ $device->OS }}</td>
                                    <td class="px-6 py-4">{{ $device->user }}</td>
                                    <td class="px-6 py-4">{{ $device->last_seen }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>