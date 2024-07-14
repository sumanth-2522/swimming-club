<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Squad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header">Create Squad</div>
                        <div class="card-body">
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                            <div class="col-md-5 mx-auto">
                                <form method="POST" action="{{ route('dashboard.insertSquad') }}">
                                @csrf

                                <!-- Squad Name -->
                                    <div>
                                        <x-label for="name" :value="__('Squad name')"/>

                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                                 :value="old('name')" required autofocus/>
                                    </div>

                                    <!-- Member count -->
                                    <div class="mt-4">
                                        <x-label for="count" :value="__('Member count')"/>

                                        <x-input id="name" class="block mt-1 w-full" type="number" name="count"
                                                 :value="old('count')" required autofocus/>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-button class="ml-4">
                                            {{ __('Create Squad') }}
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
