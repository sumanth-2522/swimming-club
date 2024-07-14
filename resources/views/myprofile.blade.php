<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member - My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header"><h5>Profile</h5></div>
                        <div class="card-body mx-auto">
                            You're in Member profile! <br>
                            <table class="table">
                                <tr>
                                    <th class="p-1">Name</th>
                                    <td>{{\Illuminate\Support\Facades\Auth::user()->first_name . ' ' . \Illuminate\Support\Facades\Auth::user()->last_name}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Age</th>
                                    <td>{{\Illuminate\Support\Facades\Auth::user()->age}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Address Line 1</th>
                                    <td>{{\Illuminate\Support\Facades\Auth::user()->address1}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Address Line 2</th>
                                    <td>{{\Illuminate\Support\Facades\Auth::user()->address2}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">City</th>
                                    <td>{{\Illuminate\Support\Facades\Auth::user()->city}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Post code</th>
                                    <td>{{\Illuminate\Support\Facades\Auth::user()->post_code}}</td>
                                </tr>

                            </table>
                            <div>
                                @if(\Illuminate\Support\Facades\Auth::user()->age >17)
                                    <a class=" btn btn-dark m-2 pl-4 pr-4"
                                       href="{{ route('dashboard.editProfile', ['id' => \Illuminate\Support\Facades\Auth::user()->id]) }}">Edit</a>
                                @endif
                            </div>

                            @if(isset($member->first_name))

                            <div>
                                <h3 class="mt-4">Child details</h3>
                            </div>

                            <table class="table">
                                <tr>
                                    <th class="p-1">Name</th>
                                    <td>{{$member->first_name . ' ' . $member->last_name}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Age</th>
                                    <td>{{$member->age}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Address Line 1</th>
                                    <td>{{$member->address1}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Address Line 2</th>
                                    <td>{{$member->address2}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">City</th>
                                    <td>{{$member->city}}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Post code</th>
                                    <td>{{$member->post_code}}</td>
                                </tr>

                            </table>
                            <div>
                                @if(\Illuminate\Support\Facades\Auth::user()->age >17)
                                    <a class=" btn btn-dark m-2 pl-4 pr-4"
                                       href="{{ route('dashboard.getEditChildDetailsPage', ['id' => $member->id]) }}">Edit</a>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
