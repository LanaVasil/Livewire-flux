<section class="w-full">
    @include('partials.settings-heading')

    {{-- <x-settings.layout :heading="__('Обліковий запис')" :subheading="__('Змінити П.І.Б. and email address')"> --}}
    <x-settings.layout :heading="__('Обліковий запис')" :subheading="__('')">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-3">
            <flux:input wire:model="name" :label="__('П.І.Б.')" type="text" required autofocus autocomplete="name" />

            <div>
                <flux:input wire:model="email" :label="__('Електрона пошта')" type="email" required autocomplete="email" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                    <div>
                        <flux:text class="mt-4">
                            {{-- {{ __('Your email address is unverified.') }} --}}
                            {{ __('Ваша електронна адреса не підтверджена.') }}

                            <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                                {{-- {{ __('Click here to re-send the verification email.') }} --}}
                                {{ __('Натисніть, щоб повторно надіслати електронний лист для підтвердження.') }}
                            </flux:link>
                        </flux:text>

                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                {{ __('На вашу електронну адресу надіслано нове посилання для підтвердження.') }}
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Зберегти') }}</flux:button>
                </div>

                {{-- <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message> --}}

                <x-toast class="me-3" on="profile-updated">
                    {{ __('Зміни збережено.') }}
                </x-toast>
            </div>
        </form>

        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>
