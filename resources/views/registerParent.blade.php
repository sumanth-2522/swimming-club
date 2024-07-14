<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Link Parent') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Link parent</h5>
                            </div>
                            <div class="card-body mx-auto">
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <div class="col-md-12">
                                    <form method="POST" action="{{ route('dashboard.registerParent') }}">
                                    @csrf

                                        <!-- Relation -->
                                        <div class="row">
                                            <x-label for="relation" :value="__('Relation')"/>
                                        </div>
                                        <div class="row">

                                            <select class="mb-4 w-full" name="id" id="id">
                                                @foreach($relatives as $relative)
                                                <option class="block mt-1 mb-4 w-full" value="{{$relative->id}}">{{$relative->first_name . ' '. $relative->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <x-button class="ml-4">
                                                {{ __('Link parent') }}
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
</x-app-layout>
