<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-end">
                        <a class="bg-blue text-blue py-6 px-3" href="{{route('tickets.create')}}">Add ticket</a>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td>
                                    {{$ticket->id}}
                                </td>
                                 <td>
                                    {{$ticket->title}}
                                </td>
                                 <td>
                                    {{$ticket->description}}
                                </td>
                                 <td>
                                    {{$ticket->status}}
                                </td>
                                 <td>
                                    {{$ticket->created_at}}
                                </td>
                                 <td>
                                    Actions
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
