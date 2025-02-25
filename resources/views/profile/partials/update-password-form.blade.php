<section class="p-6 bg-white border border-gray-300 rounded-lg shadow-md">
    <header>
        <h2 class="text-xl font-semibold text-gray-800">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 mb-2">
                {{ __('Current Password') }}
            </label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="block w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-indigo-500 focus:border-indigo-500"
                autocomplete="current-password"
                required />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-700 mb-2">
                {{ __('New Password') }}
            </label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                class="block w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-indigo-500 focus:border-indigo-500"
                autocomplete="new-password"
                required />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                {{ __('Confirm Password') }}
            </label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="block w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-indigo-500 focus:border-indigo-500"
                autocomplete="new-password"
                required />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
