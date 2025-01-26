<style>
    .login-container {
        width: 900px;
        height: auto;
        margin: 0 auto;
        padding: 30px;
        display: flex;
    }

    .login-form {
        width: 60%;
        background-color: beige;
        padding-left: 15px;
        padding-right: 25px;
        padding-top: 10%;
    }

    .login-form h2 {
        text-align: center;
    }

    .login-form form {
        display: flex;
        flex-direction: column;
        font-size: medium;
        align-items: center;
    }

    .input,
    .input-button {
        margin: 0 auto;
        width: 80%;
        padding: 0px 5px 0 5px;
    }

    .password {
        margin-top: 20px;
    }

    .input input {
        width: 100%;
        border-radius: 5px;
        height: 40px;
        border: 1px solid black;
        margin-top: 7px;
        padding-left: 5%;
    }

    .login-btn {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        width: 100%;
        gap: 8px;
        margin-right: 20%;
    }

    .login-btn button {
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        background-color: aqua;
    }

    .login-img {
        width: 40%;
        height: 500px;
    }

    .login-img img {
        width: 100%;
        height: 100%;
    }

    .rm-container {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
        gap: 8px;
        margin-left: 18%;
        margin-top: 4%;
    }

    body {
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(to right, beige 43%, transparent 43%);
        position: relative;
        /* For pseudo-element positioning */
        overflow: hidden;
    }

    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 43%;
        /* Start the image from 40% of the page */
        width: 60%;
        /* Cover the remaining 60% */
        height: 100%;
        background: url('{{ asset("img/register.jpg") }}') no-repeat center center;
        background-size: cover;
        filter: blur(8px);
        z-index: -1;
    }

    .mt-2 {
        color: red;
        font-size: 15px;
    }
</style>

<div class="login-container">
    <div class="login-img">
        <img src="{{ asset('img/register.jpg') }}" alt="Image">
    </div>
    <div class="login-form">
        <h2>Login</h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="input">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="input password">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" required>
            </div>

            <x-input-error :messages="$errors->get('error')" class="mt-2" />

            <div class="block mt-4 rm-container">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 login-btn">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                    {{ __("Don't Have an Account? Register") }}
                </a>

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

        </form>
    </div>

</div>
