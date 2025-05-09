 <div class="flex flex-col gap-6">
    <x-auth-header :title="__('Забули пароль')" :description="__('Вкажить адресу електронної пошти, щоб отримати посилання для зміни пароля')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Електрона пошта')"
            type="email"
            required
            autofocus
            placeholder="email@gmail.com"
            viewable
        />

        <flux:button variant="primary" type="submit" class="w-full">{{ __('Надіслати електроний лист') }}</flux:button>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        {{ __('Або повернутися до ') }}
        <flux:link :href="route('login')" wire:navigate>{{ __(' авторізації') }}</flux:link>
    </div>
</div>
