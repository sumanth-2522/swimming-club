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
                        <div class="card-header">
                            <h5>Compare</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <h5>Compare with other swimmers performance</h5>
                                    </div>
                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <form method="POST" action="{{route('dashboard.compareSpd')}}">
                                        @csrf
                                        <label for="choose">Choose 1st Member</label>
                                        <select class="form-select form-select-lg mb-3" name="choose" id="members">
                                            @foreach($members as $member)
                                                <option value="{{$member->id}}">{{$member->first_name}}</option>
                                            @endforeach
                                        </select>

                                        <label for="choose">Choose 2nd Member</label>
                                        <select class="form-select form-select-lg mb-3" name="choose2" id="members">
                                            @foreach($members as $member)
                                                <option value="{{$member->id}}">{{$member->first_name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="flex items-center mt-4 p-2">
                                            <x-button class="ml-4">
                                                {{ __('Compare') }}
                                            </x-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 mx-auto">
                                    @if(count($member1) > 0)
                                        <h4>1st Member</h4>
                                        <table class="table">
                                            <thead class="bg-black text-gray-50">
                                            <tr>
                                                <th>Date</th>
                                                <th>Total time</th>
                                                <th>Avg Heart rate</th>
                                                <th>Distance</th>
                                                <th>Avg Pace/Strokes</th>
                                                <th>Calories</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($member1 as $data)
                                                <tr>
                                                    <td>{{$data->updated_at }}</td>
                                                    <td>{{$data->time}} : 00 MINs</td>
                                                    <td>{{$data->heart_rate}} BPM</td>
                                                    <td>{{$data->distance }} M</td>
                                                    <td>{{$data->pace . 'M/' . $data->stroke_rate }}</td>
                                                    <td>{{$data->calories}} KCAL</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    @else
                                        <p class="alert-danger p-2">No data to show</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 mx-auto">
                                    @if(count($member2) > 0)
                                        <h4>2nd Member</h4>
                                        <table class="table">
                                            <thead class="bg-black text-gray-50">
                                            <tr>
                                                <th>Date</th>
                                                <th>Total time</th>
                                                <th>Avg Heart rate</th>
                                                <th>Distance</th>
                                                <th>Avg Pace/Strokes</th>
                                                <th>Calories</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($member2 as $data)
                                                <tr>
                                                    <td>{{$data->updated_at }}</td>
                                                    <td>{{$data->time}} : 00 MINs</td>
                                                    <td>{{$data->heart_rate}} BPM</td>
                                                    <td>{{$data->distance }} M</td>
                                                    <td>{{$data->pace . 'M/' . $data->stroke_rate }}</td>
                                                    <td>{{$data->calories}} KCAL</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    @else
                                        <p class="alert-danger p-2">No data to show for Member 2</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
