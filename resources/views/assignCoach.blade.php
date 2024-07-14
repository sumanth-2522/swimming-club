<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member - My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header"><h5>Profile</h5></div>
                        <div class="card-body">
                            <div class="col-md-8 mx-auto">
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
                                        <th class="p-2">Coach</th>
                                        @if($member->coach_id == null)
                                            <td>No Coach is assigned</td>
                                        @else
                                            @foreach($coaches as $coach)
                                                @if($member->coach_id === $coach->id)
                                                    <td>{{$coach->first_name}}</td>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tr>

                                </table>
                            </div>
                            <div class="col-md-5 mx-auto">
                                <form method="POST" action="{{ route('dashboard.updateCoach') }}">
                                    @csrf
                                    <label for="choose">Choose Coach</label>
                                    <select class="form-select form-select-lg mb-3" name="coach" id="coach">
                                        @foreach($coaches as $coach)
                                            <option value="{{$coach->id}}">{{$coach->first_name}}</option>
                                        @endforeach
                                    </select>

                                    <!-- user id -->
                                    <div class="row">
                                        <x-input id="id" class="block mt-1 mb-4 w-full" type="hidden" name="id"
                                                 value="{{$member->id}}" required autofocus/>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-button class="ml-4">
                                            {{ __('Assign Coach') }}
                                        </x-button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
