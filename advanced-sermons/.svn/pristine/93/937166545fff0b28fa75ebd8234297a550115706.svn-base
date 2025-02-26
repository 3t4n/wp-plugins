<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


// Generate list of books of the bible. Added Advanced Sermons 3.1.
function asp_generate_bible_book_list() {
    return array(
        'Old Testament' => [
            'Genesis', 'Exodus', 'Leviticus', 'Numbers', 'Deuteronomy',
            'Joshua', 'Judges', 'Ruth', '1 Samuel', '2 Samuel',
            '1 Kings', '2 Kings', '1 Chronicles', '2 Chronicles',
            'Ezra', 'Nehemiah', 'Esther', 'Job', 'Psalms', 'Proverbs',
            'Ecclesiastes', 'Song of Solomon', 'Isaiah', 'Jeremiah',
            'Lamentations', 'Ezekiel', 'Daniel', 'Hosea', 'Joel',
            'Amos', 'Obadiah', 'Jonah', 'Micah', 'Nahum',
            'Habakkuk', 'Zephaniah', 'Haggai', 'Zechariah', 'Malachi'
        ],
        'New Testament' => [
            'Matthew', 'Mark', 'Luke', 'John', 'Acts',
            'Romans', '1 Corinthians', '2 Corinthians', 'Galatians', 'Ephesians',
            'Philippians', 'Colossians', '1 Thessalonians', '2 Thessalonians',
            '1 Timothy', '2 Timothy', 'Titus', 'Philemon', 'Hebrews',
            'James', '1 Peter', '2 Peter', '1 John', '2 John',
            '3 John', 'Jude', 'Revelation'
        ]
    );
}


// Handles population of Sermon Books
function asp_populate_sermon_books() {
    $bible_books = asp_generate_bible_book_list();
    $all_books = array_merge($bible_books['Old Testament'], $bible_books['New Testament']);

    foreach ($all_books as $book) {
        if (!term_exists($book, 'sermon_book')) {
            wp_insert_term($book, 'sermon_book');
        }
    }
}