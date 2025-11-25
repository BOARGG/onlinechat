<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">
    {{-- Danger Zone Header --}}
    <div class="habbo-card bg-red-50 border-red-300">
        <div class="flex items-center gap-3 mb-4">
            <span class="text-3xl">⚠️</span>
            <div>
                <h3 class="text-xl font-bold text-red-800">{{ __('Delete account') }}</h3>
                <p class="text-sm text-red-700 mt-1">{{ __('Delete account SubText') }}</p>
            </div>
        </div>

        <button 
            type="button"
            x-data
            @click="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-6 py-3 rounded-lg font-bold text-lg transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-md bg-red-600 text-white hover:bg-red-700"
            data-test="delete-user-button"
        >
            {{ __('Delete account') }}
        </button>
    </div>

    {{-- Confirmation Modal --}}
    <div 
        x-data="{ show: @entangle('show').live }"
        x-on:open-modal.window="$event.detail === 'confirm-user-deletion' ? show = true : null"
        x-on:close-modal.window="$event.detail === 'confirm-user-deletion' ? show = false : null"
        x-show="show || {{ $errors->isNotEmpty() ? 'true' : 'false' }}"
        x-on:keydown.escape.window="show = false"
        style="display: none;"
        class="fixed inset-0 z-50 overflow-y-auto"
        x-cloak
    >
        {{-- Backdrop --}}
        <div 
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm"
            @click="show = false"
        ></div>

        {{-- Modal Content --}}
        <div class="flex min-h-full items-center justify-center p-4">
            <div 
                x-show="show"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative habbo-card max-w-lg w-full"
                @click.stop
            >
                <form wire:submit="deleteUser" class="space-y-6">
                    {{-- Header --}}
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-red-100 flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">🗑️</span>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-habbo-blue-dark">
                                {{ __('Are you sure you want to delete your account') }}
                            </h2>
                            <p class="text-gray-600 text-sm mt-2">
                                {{ __('Delete account SubSubText') }}
                            </p>
                        </div>
                    </div>

                    {{-- Password Input --}}
                    <div>
                        <label for="delete_password" class="block text-sm font-bold text-gray-700 mb-2">
                            🔒 {{ __('Password') }}
                        </label>
                        <input 
                            id="delete_password"
                            type="password" 
                            wire:model="password"
                            required
                            class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-red-500 focus:ring-4 focus:ring-red-500/20 transition-all outline-none @error('password') border-red-500 @enderror"
                            placeholder="••••••••"
                        >
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end gap-3">
                        <button 
                            type="button"
                            @click="show = false"
                            class="px-6 py-3 rounded-lg font-bold text-base transition-all bg-gray-200 text-gray-700 hover:bg-gray-300"
                        >
                            {{ __('Cancel') }}
                        </button>
                        <button 
                            type="submit"
                            class="px-6 py-3 rounded-lg font-bold text-base transition-all bg-red-600 text-white hover:bg-red-700 shadow-md"
                            data-test="confirm-delete-user-button"
                        >
                            {{ __('Delete account') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('modalData', () => ({
            show: false
        }))
    })
</script>
@endpush