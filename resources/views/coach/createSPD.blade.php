<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Swim performance data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Enter Training performace data</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <strong>Name:</strong> {{$member->first_name}}<br>
                                        <strong>Gender:</strong> {{$member->gender}}<br>
                                        <strong>Age:</strong> {{$member->age}}
                                    </div>

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <div class="col-sm-4 mx-auto">
                                    <form method="POST" action="{{ route('dashboard.insertSPD') }}">
                                    @csrf

                                    <!-- Time -->
                                        <div class="row">
                                            <x-label for="time" :value="__('Time')"/>

                                            <x-input id="time" class="block mt-1 mb-4 w-full" type="number" name="time"
                                                     :value="old('time')" required autofocus/>
                                        </div>

                                        <!-- Heart rate -->
                                        <div class="row">
                                            <x-label for="heartrate" :value="__('Heart rate')"/>

                                            <x-input id="heartrate" class="block mt-1 mb-4 w-full" type="number"
                                                     name="heartrate" :value="old('heartrate')" required autofocus/>
                                        </div>

                                        <!-- Distance -->
                                        <div class="row">
                                            <x-label for="distance" :value="__('Distance')"/>

                                            <x-input id="distance" class="block mt-1 mb-4 w-full" type="number"
                                                     name="distance" :value="old('distance')" required autofocus/>
                                        </div>

                                        <!-- Pace -->
                                        <div class="row">
                                            <x-label for="pace" :value="__('Pace')"/>

                                            <x-input id="pace" class="block mt-1 mb-4 w-full" type="number" name="pace"
                                                     :value="old('pace')" required autofocus/>
                                        </div>

                                        <!-- Stroke count -->
                                        <div class="row">
                                            <x-label for="strokecount" :value="__('Stroke count')"/>

                                            <x-input id="strokecount" class="block mt-1 mb-4 w-full" type="number"
                                                     name="strokecount" :value="old('strokecount')" required autofocus/>
                                        </div>

                                        <!-- Stroke rate -->
                                        <div class="row">
                                            <x-label for="strokerate" :value="__('Stroke rate')"/>

                                            <x-input id="strokerate" class="block mt-1 mb-4 w-full" type="number"
                                                     name="strokerate" :value="old('strokerate')" required autofocus/>
                                        </div>

                                        <!-- Calories -->
                                        <div class="row">
                                            <x-label for="calories" :value="__('Calories')"/>

                                            <x-input id="calories" class="block mt-1 mb-4 w-full" type="number"
                                                     name="calories" :value="old('calories')" required autofocus/>
                                        </div>

                                        <!-- Distance per stroke -->
                                        <div class="row">
                                            <x-label for="distanceperstroke" :value="__('Distance per stroke')"/>

                                            <x-input id="distanceperstroke" class="block mt-1 mb-4 w-full" type="number"
                                                     name="distanceperstroke" :value="old('distanceperstroke')" required
                                                     autofocus/>
                                        </div>

                                        <!-- Updated by -->
                                        <div class="row">
                                            <x-input id="updatedby" class="block mt-1 mb-4 w-full" type="hidden"
                                                     name="updatedby" value="{{\Illuminate\Support\Facades\Auth::id()}}"
                                                     required autofocus/>
                                        </div>

                                        <!-- user id -->
                                        <div class="row">
                                            <x-input id="id" class="block mt-1 mb-4 w-full" type="hidden" name="id"
                                                     value="{{$member->id}}" required autofocus/>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <x-button class="ml-4">
                                                {{ __('Insert training data') }}
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
        </div>
    </div>
</x-app-layout>
