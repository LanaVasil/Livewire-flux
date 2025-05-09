<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Додати обліковий запис')" :description="__('Введіть свої дані нижче, щоб створити обліковий запис')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Прізвище Ім`я по Батькові')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('від 10 до 255 символів')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Електрона пошта')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@gmail.com"
        />

        <!-- Login -->
        <flux:input
            wire:model="login"
            :label="__('Логін')"
            type="text"
            required
            autocomplete="login"
            placeholder="від 3 до 32 символів"
        />

        <!-- Phone -->
        <flux:input
            wire:model="phone"
            :label="__('Телефон')"
            type="tel"
            required
            autocomplete="phone"
            maxlength="10"
            placeholder="0951110033"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Пароль')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Пароль')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Підтвердити пароль')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Підтвердити пароль')"
            viewable
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Додати') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Вже маєте обліковий запис?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __(' Авторізація') }}</flux:link>
    </div>
</div>
