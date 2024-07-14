<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member - My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card">
                    <div class="col-md-8">
                        <div class="p-6 bg-white border-b border-gray-200">
                             You're in Member profile! <br>
                                You can view your squads here!
                        </div>
                        <div class="row">
                            <table class="table table-condensed ml-3">
                                <tr>
                                    <th class="p-2">Name</th>
                                    <td>{{$squad->name}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Member count</th>
                                    <td>{{$squad->member_count}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Coach</th>
                                    <td>{{\Illuminate\Support\Facades\Auth::user()->first_name}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Members</th>
                                    <td>@foreach($members as $member)
                                            {{$member->first_name}} <br>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="row">
                            <a class="btn btn-success m-2" href="{{route('squads.addMembers',['id'=>$squad->id])}}">Add members </a>
                            <a class="btn btn-danger m-2" href="{{route('squads.removeMembers',['id'=>$squad->id])}}">Remove members </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
