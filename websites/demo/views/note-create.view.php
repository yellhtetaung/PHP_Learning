<?php require "views/partials/head.php"; ?>
<?php require "views/partials/nav.php"; ?>
<?php require "views/partials/banner.php"; ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->

        <a href="/notes"
           class="rounded-md bg-indigo-600 px-3.5 py-2.5 inline-block text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go
            back</a>


        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 mt-6">
            <form class="space-y-6" method="POST">
                <div>
                    <label for="body"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your note</label>

                    <textarea name="body"
                              id="body"
                              class="block p-2.5 w-full min-h-[120px] max-h-[500px] text-sm <?= isset($errors['body']) ? 'text-red-900 bg-red-50 rounded-lg border border-red-300 focus:ring-red-500 focus:border-red-500 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500' : 'text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' ?>"
                              placeholder="Enter your note..."><?= $_POST['body'] ?? '' ?></textarea>

                    <?php if (isset($errors['body'])) : ?>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><?= $errors['body'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="flex justify-end items-center gap-3">
                    <button type="button"
                            onclick="history.back()"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 cursor-pointer">
                        Cancel
                    </button>

                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">
                        Submit
                    </button>
                </div>
            </form>
        </div>

    </div>
</main>

<?php require "views/partials/footer.php"; ?>
