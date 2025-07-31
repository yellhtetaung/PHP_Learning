<?php require "views/partials/head.php"; ?>
<?php require "views/partials/nav.php"; ?>
<?php require "views/partials/banner.php"; ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->

        <div class="flex justify-end items-center">
            <a href="/notes/create"
               class="rounded-md bg-indigo-600 px-3.5 py-2.5 inline-block text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                note</a>
        </div>

        <div class="relative overflow-x-auto overflow-y-auto max-h-screen shadow-md sm:rounded-lg mt-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Body
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($notes); $i++) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $i + 1 ?>
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                            <?= htmlspecialchars($notes[$i]['body']) ?>
                        </th>
                        <td class="px-6 py-4 text-right">
                            <a href="/note?id=<?= $notes[$i]['id'] ?>"
                               class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>
                <?php endfor; ?>
                </tbody>
            </table>
        </div>

    </div>
</main>

<?php require "views/partials/footer.php"; ?>
