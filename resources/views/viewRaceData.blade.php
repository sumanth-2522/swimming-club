<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Race Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header">
                            <h5>Race Data</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mx-auto">
                                    <table class="table">
                                        <thead class="bg-black text-gray-50">
                                        <tr>
                                            <th>Id</th>
                                            <th>Date</th>
                                            <th>Member</th>
                                            <th>Tournament</th>
                                            <th>Swim Stroke</th>
                                            <th>Course</th>
                                            <th>Competition</th>
                                            <th>Position</th>
                                            <th>
                                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                                Action
                                            @endif
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                            @foreach($raceData as $data)
                                                <tr>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->updated_at }}</td>
                                                    <td>
                                                        @foreach($members as $member)
                                                            @if($member->id === $data->user_id)
                                                                {{$member->first_name}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{$data->tournament}}</td>
                                                    <td>{{$data->swim_stroke}}</td>
                                                    <td>{{$data->course }}</td>
                                                    <td>{{$data->competition }}</td>
                                                    <td>{{$data->position}}</td>
                                                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                                        <td>
                                                            <a class="btn btn-dark mb-1"
                                                               href="{{route('raceData.edit', ['id'=>$data->id])}}">Edit</a><br>
                                                        <a class="btn btn-danger mb-1"
                                                               href="{{route('raceData.delete', ['id'=>$data->id])}}">Detele</a><br>
                                                        @if($data->validate == 1)
                                                            <a class="btn btn-success disabled mb-1" href="">Validated</a></td>
                                                        @else
                                                            <a class="btn btn-danger mb-1"
                                                                   href="{{route('raceData.validate', ['id'=>$data->id])}}">Validate</a></td>

                                                        @endif
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach($raceData as $data)
                                                @if($data->validate == 1)
                                                    <tr>
                                                        <td>{{$data->id}}</td>
                                                        <td>{{$data->updated_at }}</td>
                                                        <td>
                                                            @foreach($members as $member)
                                                                @if($member->id === $data->user_id)
                                                                    {{$member->first_name}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{$data->tournament}}</td>
                                                        <td>{{$data->swim_stroke}}</td>
                                                        <td>{{$data->course }}</td>
                                                        <td>{{$data->competition }}</td>
                                                        <td>{{$data->position}}</td>
                                                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                                            <td><a class="btn btn-dark"
                                                                   href="{{route('raceData.edit', ['id'=>$data->id])}}">Edit</a>
                                                            </td>
                                                            <td><a class="btn btn-danger"
                                                                   href="{{route('raceData.delete', ['id'=>$data->id])}}">Detele</a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <div class="pagination-lg">
                                        {{ $raceData->links() }}
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
