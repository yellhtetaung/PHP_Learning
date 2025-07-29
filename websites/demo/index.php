<?php

$books = [
    [
        "name" => "Do Androids Dream of Electric Sheep?",
        "author" => "Philip K. Dick",
        "releaseYear" => 1968,
        "purchaseUrl" => "https://example.com/androids-dream"
    ],
    [
        "name" => "Project Hail Mary",
        "author" => "Andy Weir",
        "releaseYear" => 2021,
        "purchaseUrl" => "https://example.com/hail-mary"
    ],
    [
        "name" => "Electric Sheep",
        "author" => "Andy Weir",
        "releaseYear" => 2022,
        "purchaseUrl" => "https://example.com/electric-sheep"
    ]
];

/**
 * This method is alternative array_filter method.
 * @param $books
 * @param $callback
 * @return array
 */
function filter($books, $callback): array
{
    $filteredItem = [];

    foreach ($books as $book) {
        if ($callback($book)) {
            $filteredItem[] = $book;
        }
    }

    return $filteredItem;
}

$filteredBooks = filter($books, function ($book) {
    return $book['author'] == 'Andy Weir';
});

require "index.view.php";

