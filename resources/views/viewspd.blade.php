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
                        <div class="card-header">
                            <h5>Swim training performance data</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-11 mx-auto">
                                    @if(count($swimData) > 0)
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
                                @foreach($swimData as $data)
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
                                    <p class="alert-danger p-2">No Swim training performance data found for {{\Illuminate\Support\Facades\Auth::user()->first_name}}</p>
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
