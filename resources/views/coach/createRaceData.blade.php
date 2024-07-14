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
                                <h5>Enter Race data</h5>
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
                                <div class="col-sm-7  mx-auto">
                                    <form method="POST" action="{{ route('dashboard.insertRaceData') }}">
                                    @csrf

                                    <!-- Tournament -->
                                        <div class="row">
                                        <label for="tournament">Tournament</label>
                                        </div>
                                        <div class="row  mb-4">
                                        <select name="tournament" id="members">
                                            <option class="block mt-1 mb-4 w-full" value="Annual Championship">Annual Championship</option>
                                            <option class="block mt-1 mb-4 w-full" value="Club Championship">Club Championship</option>
                                            <option class="block mt-1 mb-4 w-full" value="Junior Championship">Junior Championship</option>
                                            <option class="block mt-1 mb-4 w-full" value="Adult Championship">Adult Championship</option>
                                        </select>
                                        </div>

                                        <!-- Swim Stroke -->
                                        <div class="row">
                                            <label for="swimstroke">Swim Stroke</label>
                                        </div>
                                        <div class="row  mb-4">
                                            <select name="swimstroke" id="members">
                                                <option class="block mt-1 mb-4 w-full" value="Freestyle">Freestyle</option>
                                                <option class="block mt-1 mb-4 w-full" value="Backstroke">Backstroke</option>
                                                <option class="block mt-1 mb-4 w-full" value="Butterfly">Butterfly</option>
                                                <option class="block mt-1 mb-4 w-full" value="breaststroke">Breaststroke</option>
                                            </select>
                                        </div>

                                        <!-- Course -->
                                        <div class="row">
                                            <label for="course">course</label>
                                        </div>
                                        <div class="row  mb-4">
                                            <select name="course" id="members">
                                                <option class="block mt-1 mb-4 w-full" value="25 meters">25 meters</option>
                                                <option class="block mt-1 mb-4 w-full" value="50 meters">50 meters</option>
                                            </select>
                                        </div>

                                        <!-- Competition -->
                                        <div class="row">
                                            <label for="competition">Competition</label>
                                        </div>
                                        <div class="row  mb-4">
                                            <select name="competition" id="members">
                                                <option class="block mt-1 mb-4 w-full" value="10 and under">10 and under</option>
                                                <option class="block mt-1 mb-4 w-full" value="11-12">11-12</option>
                                                <option class="block mt-1 mb-4 w-full" value="13-14">13-14</option>
                                                <option class="block mt-1 mb-4 w-full" value="15-17">15-17</option>
                                                <option class="block mt-1 mb-4 w-full" value="Adult">Adult</option>
                                            </select>
                                        </div>

                                        <!-- position -->
                                        <div class="row">
                                            <label for="position">Position</label>
                                        </div>
                                        <div class="row  mb-4">
                                            <select name="position" id="members">
                                                @for($i = 1; $i<9; $i++)
                                                    <option class="block mt-1 mb-4 w-full" value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
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

                                        <div class="flex items-center mt-4">
                                            <x-button class="ml-4">
                                                {{ __('Insert Race data') }}
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
