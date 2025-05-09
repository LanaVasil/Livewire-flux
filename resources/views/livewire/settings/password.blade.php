<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Змінити пароль')" :subheading="__('Для забезпечення безпеки вашого облікового запису використовуйте складний пароль')">
        <form wire:submit="updatePassword" class="mt-6 space-y-6">
            <flux:input
                wire:model="current_password"
                :label="__('Поточний пароль')"
                type="password"
                required
                autocomplete="current-password"
            />
            <flux:input
                wire:model="password"
                :label="__('Новий пароль')"
                type="password"
                required
                autocomplete="new-password"
            />
            <flux:input
                wire:model="password_confirmation"
                :label="__('Підтвердити пароль')"
                type="password"
                required
                autocomplete="new-password"
            />

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Зберегти') }}</flux:button>
                </div>

                {{-- <x-action-message class="me-3" on="password-updated">
                    {{ __('Збережено.') }}
                </x-action-message> --}}
                <x-toast class="me-3" on="password-updated">
                  {{ __('Зміни збережено.') }}
                </x-toast>

            </div>
        </form>
    </x-settings.layout>
</section>
