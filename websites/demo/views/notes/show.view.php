<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->

        <a href="/notes"
           class="rounded-md bg-indigo-600 px-3.5 py-2.5 inline-block text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go
            back</a>


        <div class="w-full p-6 mt-6 bg-white border border-gray-200 rounded-lg shadow-sm">
            <p class="mb-3 font-normal text-gray-700"><?= htmlspecialchars($note['body']) ?></p>

            <form class="mt-6" method="POST">
                <input type="hidden" name="_method" value="DELETE"/>
                <input type="hidden" value="<?= $note['id'] ?>" name="id"/>
                <a href="/note/edit?id=<?= $note['id'] ?>"
                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-slate-700 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300">Edit</a>

                <button type="submit"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                    Delete
                </button>
            </form>
        </div>


    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>
