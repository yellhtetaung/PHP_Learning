<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600"
                     alt="Your Company" class="mx-auto h-10 w-auto"/>
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Register for a new
                    account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form action="/register" method="POST" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                        <div class="mt-2">
                            <input id="name" type="text" name="name"
                                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base outline-1 -outline-offset-1 focus:outline-2 focus:-outline-offset-2 sm:text-sm/6 <?= isset($errors['name']) ? 'text-red-900 outline-red-300 placeholder:text-red-400 focus:outline-red-600' : 'text-gray-900 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600' ?>"/>
                        </div>

                        <?php if (isset($errors['name'])) : ?>
                            <p class="mt-2 text-sm text-red-600"><?= $errors['name'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" autocomplete="email"
                                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base outline-1 -outline-offset-1 focus:outline-2 focus:-outline-offset-2 sm:text-sm/6 <?= isset($errors['email']) ? 'text-red-900 outline-red-300 placeholder:text-red-400 focus:outline-red-600' : 'text-gray-900 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600' ?>"/>
                        </div>
                        <?php if (isset($errors['email'])) : ?>
                            <p class="mt-2 text-sm text-red-600"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" type="password" name="password"
                                   autocomplete="current-password"
                                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base outline-1 -outline-offset-1 focus:outline-2 focus:-outline-offset-2 sm:text-sm/6 <?= isset($errors['password']) ? 'text-red-900 outline-red-300 placeholder:text-red-400 focus:outline-red-600' : 'text-gray-900 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600' ?>"/>
                        </div>

                        <?php if (isset($errors['password'])) : ?>
                            <p class="mt-2 text-sm text-red-600"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-center">
                        <input id="showPassword" type="checkbox" onchange="toggleShowPassword(event)"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                        <label for="showPassword" class="ms-2 text-sm font-medium text-gray-900">Show
                            Password</label>
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Register
                        </button>
                    </div>

                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Already have an account?
                        <a href="/login"
                           class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign in</a>
                    </p>
                </form>
            </div>
        </div>

    </div>
</main>

<script type="application/javascript">
    const passwordInput = document.getElementById('password');

    function toggleShowPassword(event) {
        if (event.target.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

<?php require base_path("views/partials/footer.php"); ?>
