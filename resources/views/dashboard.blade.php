<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin - Dashboard') }}
        </h2>
        <x-nav-link :href="route('dashboard.viewSquad')" :active="request()->routeIs('dashboard.viewSquad')">
            {{ __('View Squards') }}
        </x-nav-link>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-xs-4">
                                <h2 class="h2">
                                    Welcome to Swim-club admin interface!
                                </h2>
                                <p>Admins have the highest access over the system.</p>
                                <p>Admin responsibilities include..</p>
                            </div>
                            <div class="col-xs-5 mx-auto">
                            <section>

                                <ul class="list-group-flush">
                                    <li class="list-group-item">Assign coaches to members</li>
                                    <li class="list-group-item">Maintain their personal data</li>
                                    <li class="list-group-item">Compare swim performance of different members</li>
                                    <li class="list-group-item">Edit, delete, Validate race data</li>
                                </ul>
                            </section>
                            </div>
                            </div>
                            <h3>Members</h3>
                            <table class="table">
                                <thead class="bg-black text-gray-50">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Address Line 1</th>
                                    <th>Address Line 2</th>
                                    <th>City</th>
                                    <th>Post Code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{$member->id}}</td>
                                        <td>{{$member->first_name .' ' .$member->last_name}}</td>
                                        <td>{{$member->gender }}</td>
                                        <td>{{$member->age }}</td>
                                        <td>{{$member->address1 }}</td>
                                        <td>{{$member->address2 }}</td>
                                        <td>{{$member->city }}</td>
                                        <td>{{$member->post_code }}</td>

                                        <td><a class="btn btn-dark"
                                               href="{{route('dashboard.assignCoach', ['id'=>$member->id])}}">Assign
                                                coach</a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="">
                                {{ $members->links() }}
                            </div>

                            <div>
                                <h3>Coaches</h3>
                                <table class="table">
                                    <thead class="bg-black text-gray-50">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Address Line 1</th>
                                        <th>Address Line 2</th>
                                        <th>City</th>
                                        <th>Post Code</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coaches as $coach)
                                        <tr>
                                            <td>{{$coach->id}}</td>
                                            <td>{{$coach->first_name .' ' .$coach->last_name}}</td>
                                            <td>{{$coach->gender }}</td>
                                            <td>{{$coach->age }}</td>
                                            <td>{{$coach->address1 }}</td>
                                            <td>{{$coach->address2 }}</td>
                                            <td>{{$coach->city }}</td>
                                            <td>{{$coach->post_code }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <div class="">
                                    {{ $coaches->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
