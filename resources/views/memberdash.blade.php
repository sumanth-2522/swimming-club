<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member - Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header">
                            <h5>Member</h5>

                        </div>
                        <div class="card-body">
                            @if(isset($relative->first_name))
                                <table class="table">
                                    <tr>
                                        <th class="p-1">Name</th>
                                        <td>{{$relative->first_name . ' ' . $relative->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="p-2">Relation</th>
                                        <td>{{$relative->relation}}</td>
                                    </tr>

                                </table>
                            @else
                                @if(\Illuminate\Support\Facades\Auth::user()->age < 17)
                                    <h5>Register parent</h5>
                                    <a class="btn btn-success" href="{{route('dashboard.registerParent')}}">Link parent</a>
                                @endif
                            @endif

                            <div class="col-md-12 mx-auto">
                                <h3 class="h3">You are logged in as <mark>Member</mark></h3>
                                <p class="lead">As a member, you are able to</p>
                                <ul>
                                    <li>Link your profile with a parent if you are 17 years old or under</li>
                                    <li>View your profile</li>
                                    <li>Edit your profile</li>
                                    <li>Check your swim training records</li>
                                    <li>Compare your swim records with other members of the club</li>
                                    <li>And finally, you can see Race data</li>
                                </ul>
                                <p class="small">Follow the links above to access your system</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
