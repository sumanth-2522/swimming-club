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
                    <div class="card-header">
                        <h5>Add members to squad</h5>
                    </div>
                    <div class="card-body">
                    <div class="col-md-5 mx-auto">
                        <p>Please select members from the list below to add to squad</p>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="row">

                            <form method="POST" action="{{route('squads.insertMembers')}}">
                                @csrf
                                @foreach($members as $member)
                                    <div>
                                        <x-input id="member" class="mb-1" type="checkbox" name="members[]" value="{{$member->id}}" />
                                        <label class="mb-3 font-weight-bold" for="member"> {{$member->first_name}}</label>
                                    </div>
                                    <div>
                                        <x-input id="member" class="ml-3" type="hidden" name="squadId" value="{{$squad->id}}" />
                                    </div>
                                @endforeach
                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="">
                                        {{ __('Add members') }}
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
