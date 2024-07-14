<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coach - Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header"><h5>Coach Dashboard</h5></div>
                        <div class="card-body">
                    You're logged in as Coach!
                    {{\Illuminate\Support\Facades\Auth::user()->id}}
                <div class="p-6">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a class="btn btn-success" href="{{route('dashboard.createSquad')}}">Click here to Create Squad</a>
                    </div>
                    <h3>Squads</h3>
                    <table class="table">
                        <thead class="bg-black text-gray-50">
                        <tr>
                            <th>Id</th>
                            <th>Squad name</th>
                            <th>Member count</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($squads as $squad)
                            <tr>
                                <td>{{$squad->id}}</td>
                                <td>{{$squad->name}}</td>
                                <td>{{$squad->member_count }}</td>
                                <td><a class="btn btn-success" href="{{route('dashboard.viewSquad', ['id' => $squad->id])}}">View</a>
                                    <a class="btn btn-dark pl-3" href="{{route('dashboard.editSquad', ['id' => $squad->id])}}">Edit</a>
{{--                                    <a class="btn btn-danger pl-3" href="viewSquad">Delete</a>--}}

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="p-6">
                    <h3>Members</h3>
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
                                <td><a class="btn btn-success" href="{{route('dashboard.addTrainingSPD', ['id' => $member->id])}}">add swim performance data</a>
                                    <a class="btn btn-success pl-3" href="{{route('dashboard.addRaceData', ['id' => $member->id])}}">Add Race data</a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="">
                        {{ $members->links() }}
                    </div>
                </div>
                </div>

                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
