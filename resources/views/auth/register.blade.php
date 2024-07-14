<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
                <div>
                    <x-label for="firstname" :value="__('First name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />
                </div>

                <!-- Last Name -->
                <div class="mt-4">
                    <x-label for="lastname" :value="__('Last name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus />
                </div>

                <!-- gender -->
                <div class="mt-4">
                    <x-label for="gender" :value="__('Gender')" />

                    <x-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" required autofocus />
                </div>

                <!-- Age -->
                <div class="mt-4">
                    <x-label for="age" :value="__('Age')" />

                    <x-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus />
                </div>

                <!-- Address 1 -->
                <div class="mt-4">
                    <x-label for="address1" :value="__('Address Line 1')" />

                    <x-input id="address1" class="block mt-1 w-full" type="text" name="address1" :value="old('address1')" required autofocus />
                </div>

                <!-- Address 2 -->
                <div class="mt-4">
                    <x-label for="address2" :value="__('Address Line 2')" />

                    <x-input id="address2" class="block mt-1 w-full" type="text" name="address2" :value="old('address2')" required autofocus />
                </div>

                <!-- City -->
                <div class="mt-4">
                    <x-label for="city" :value="__('City')" />

                    <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
                </div>

                <!-- Post code -->
                <div class="mt-4">
                    <x-label for="postcode" :value="__('Post code')" />

                    <x-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode')" required autofocus />
                </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

                <div class="row">
                    <x-label for="role" :value="__('Register as')"/>
                </div>
                <div class="mt-4">

                    <select class="mb-4 w-full" name="role" id="role">
                        <option class="block mt-1 mb-4 w-full" value="member">member</option>
                        <option class="block mt-1 mb-4 w-full" value="parent">parent</option>
                    </select>
                </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
