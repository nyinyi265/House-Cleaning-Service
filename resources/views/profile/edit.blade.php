<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-50 via-gray-100 to-blue-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Page Header -->
    <header class="text-center py-8">
        <h1 class="text-4xl font-extrabold text-blue-600">Profile Management</h1>
        <p class="text-gray-500 mt-2">Manage your profile, password, and account settings</p>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-4xl mx-auto px-6 sm:px-8 space-y-10">

            <!-- Update Profile Information -->
            <section class="bg-white shadow-md rounded-xl p-6">
                <h2 class="text-xl font-semibold text-blue-600 mb-4">Update Profile Information</h2>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </section>

            <!-- Update Password -->
            <section class="bg-white shadow-md rounded-xl p-6">
                <h2 class="text-xl font-semibold text-blue-600 mb-4">Update Password</h2>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </section>

            <!-- Delete User -->
            <section class="bg-white shadow-md rounded-xl p-6 border-t-4 border-red-500">
                <h2 class="text-xl font-semibold text-red-600 mb-4">Delete Account</h2>
                <p class="text-gray-600 mb-4">
                    Deleting your account will permanently remove all your data. Please proceed with caution.
                </p>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </section>

        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-6 mt-10 text-sm text-gray-600">
        &copy; 2025 Crystal Clear. All rights reserved.
    </footer>
</body>
</html>
