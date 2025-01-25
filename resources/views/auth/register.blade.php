<style>
    .register-container {
        width: 900px;
        height: auto;
        margin: 0 auto;
        /* background-color: grey; */
        padding: 30px;
        display: flex;
    }

    .register-form {
        width: 60%;
        background-color: beige;
        padding-left: 15px;
        padding-right: 25px;
    }

    .register-form h2 {
        text-align: center;
    }

    .register-form form {
        display: flex;
        flex-direction: column;
        font-size: medium;
        align-items: center;
    }

    .input,
    .input-button {
        margin: 0 auto;
        width: 80%;
        padding: 5px 5px 0 5px;
    }

    .input input {
        width: 100%;
        border-radius: 5px;
        height: 40px;
        border: 1px solid black;
        margin-top: 7px;
        padding-left: 5%;
    }

    .input-button {
        display: flex;
        justify-content: end;
        margin-top: 3%;
    }

    .input-button button {
        width: 25%;
        border: none;
        padding: 9px;
        border-radius: 5px;
        cursor: pointer;
        background-color: aqua;
    }

    .input-button a {
        margin-right: 5%;
        margin-top: 1%;
        color: blue;
    }

    .register-img {
        width: 40%;
        height: 500px;
    }

    .register-img img {
        width: 100%;
        height: 100%;
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
        /* Apply blur effect to the image */
        z-index: -1;
        /* Ensure it stays behind the content */
    }

    .custom-error{
        color: red;
        font-size: 15px;
    }
</style>

<div class="register-container">
    <div class="register-img">
        <img src="{{ asset('img/register.jpg') }}" alt="Image">
    </div>
    <div class="register-form">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="input">
                <label for="name">Name</label><br>
                <input type="text" name="name" id="name" required>
                <x-input-error :messages="$errors->get('name')" class="custom-error" />
            </div>

            <!-- Email -->
            <div class="input">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required>
                <x-input-error :messages="$errors->get('email')" class="custom-error" />
            </div>

            <div class="input">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" required>
                <x-input-error :messages="$errors->get('password')" class="custom-error" />
            </div>

            <div class="input">
                <label for="phone">Phone Number</label><br>
                <input type="text" name="phone" id="phone" required>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="input">
                <label for="address">Address</label><br>
                <input type="text" name="address" id="address" required>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="input-button">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit">Register</button>
            </div>
        </form>
    </div>

</div>