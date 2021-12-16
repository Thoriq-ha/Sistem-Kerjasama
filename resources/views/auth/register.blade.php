<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="Nama Lengkap (PIC)" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <div>
                    <x-jet-label for="telp" value="Telephone" />
                    <x-jet-input id="telp" class="block mt-1 w-full" type="text" name="telp" :value="old('telp')"
                        required autofocus autocomplete="telp" />
                </div>
                <div class="mt-4">
                    <div>
                        <x-jet-label for="alamat" value="Alamat" />
                        <x-jet-input id="alamat" class="block mt-1 w-full" type="text" name="alamat"
                            :value="old('alamat')" required autofocus autocomplete="alamat" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="nama_lembaga" value="Nama Lembaga" />
                        <x-jet-input id="nama_lembaga" class="block mt-1 w-full" type="text" name="nama_lembaga" required
                            autocomplete="new-nama_lembaga" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="keterangan" value="Keterangan" />
                        <x-jet-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan" required
                            autocomplete="new-keterangan" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button class="ml-4">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
