<section class="p-6 bg-white rounded-lg border border-gray-300 shadow-md space-y-6">
    <header>
        <h2 class="text-xl font-semibold text-gray-800">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        type="button"
        class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-gray-50 rounded-lg shadow-md">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-gray-800">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('Password') }}
                </label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-red-500 focus:border-red-500"
                    placeholder="{{ __('Password') }}"
                    required />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <button
                    type="button"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400"
                    x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </button>

                <button
                    type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg shadow ml-3 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
