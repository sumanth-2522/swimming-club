<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coaches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                    You can view all the members here!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
