<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->

        <a href="/notes"
           class="rounded-md bg-indigo-600 px-3.5 py-2.5 inline-block text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go
            back</a>


        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 mt-6">
            <form class="space-y-6" action="/note" method="POST">
                <input type="hidden" name="_method" value="PATCH"/>
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <div>
                    <label for="body"
                           class="block mb-2 text-sm font-medium text-gray-900">Your note</label>

                    <textarea name="body"
                              id="body"
                              class="block p-2.5 w-full min-h-[120px] max-h-[500px] text-sm <?= isset($errors['body']) ? 'text-red-900 bg-red-50 rounded-lg border border-red-300 focus:ring-red-500 focus:border-red-500' : 'text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500' ?>"
                              placeholder="Enter your note..."><?= $note['body'] ?? '' ?></textarea>

                    <?php if (isset($errors['body'])) : ?>
                        <p class="mt-2 text-sm text-red-600"><?= $errors['body'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="flex justify-end items-center gap-3">
                    <a href="/notes"
                       class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        Cancel
                    </a>

                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        Submit
                    </button>
                </div>
            </form>
        </div>

    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>
