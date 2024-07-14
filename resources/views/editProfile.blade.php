<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member - My Profile') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto m:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body mx-auto">
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <div class="col-md-12">
                                    <form class="form-group" method="POST" action="{{route('dashboard.editDetails')}}">
                                        @csrf
                                        <div class="row">
                                            <x-label for="firstname" :value="__('First Name')"/>
                                            <x-input type="text" class="block mt-1 mb-4 w-full" name="firstname"
                                                     value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}"
                                                     disabled required autofocus/>
                                        </div>
                                        <div class="row">
                                            <x-label for="lastname" :value="__('Last Name')"/>
                                            <x-input type="text" class="block mt-1 mb-4 w-full" name="lastname"
                                                     value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}"
                                                     required autofocus/>
                                        </div>
                                        <div class="row">
                                            <x-label for="age" :value="__('Age')"/>
                                            <x-input type="text" class="block mt-1 mb-4 w-full" name="age"
                                                     value="{{\Illuminate\Support\Facades\Auth::user()->age}}" required
                                                     autofocus/>
                                        </div>
                                        <div class="row">
                                            <x-label for="address1" :value="__('Address Line 1')"/>
                                            <x-input type="text" class="block mt-1 mb-4 w-full" name="address1"
                                                     value="{{\Illuminate\Support\Facades\Auth::user()->address1}}"
                                                     required autofocus/>
                                        </div>
                                        <div class="row">
                                            <x-label for="address2" :value="__('Address Line 2')"/>
                                            <x-input type="text" class="block mt-1 mb-4 w-full" name="address2"
                                                     value="{{\Illuminate\Support\Facades\Auth::user()->address2}}"
                                                     required autofocus/>
                                        </div>
                                        <div class="row">
                                            <x-label for="city" :value="__('City')"/>
                                            <x-input type="text" class="block mt-1 mb-4 w-full" name="city"
                                                     value="{{\Illuminate\Support\Facades\Auth::user()->city}}" required
                                                     autofocus/>
                                        </div>
                                        <div class="row">
                                            <x-label for="postcode" :value="__('Post Code')"/>
                                            <x-input type="text" class="block mt-1 mb-4 w-full" name="postcode"
                                                     value="{{\Illuminate\Support\Facades\Auth::user()->post_code}}"
                                                     required autofocus/>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <x-button class="ml-4">
                                                {{ __('Edit') }}
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
