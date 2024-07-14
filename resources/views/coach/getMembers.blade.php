<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead class="bg-black text-gray-50">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>{{$member->id}}</td>
                                <td>{{$member->first_name .' ' .$member->last_name}}</td>
                                <td>{{$member->gender }}</td>
                                <td>{{$member->age }}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="">
                        {{ $members->links() }}
                    </div>
                    You can view all the members here!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
