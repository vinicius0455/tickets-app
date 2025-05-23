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
                    <h3 class="font-bold">Add a new ticket</h3>
                    <form action="{{route('tickets.store')}}" method="POST">
                        @csrf

                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="border rounded w-full py-2 px-3" required>
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="border rounded w-full py-2 px-3" required></textarea>
                        <label for="status">Status</label>
                        <select name="status" id="status" class="border rounded w-full py-2 px-3"> 
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                            <option value="pending">Pending</option>
                        </select>
                        <div class="mt-6 flex items-center justify-end gap-4">
                            <a href="{{route('tickets.index')}}">Cancel</a>
                            <button type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
