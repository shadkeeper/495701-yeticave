<?php

require ('data.php');
require ('functions.php');

session_start();

$page_content = render_page('index',
    [
        'categories' => $categories,
        'goods' => $goods,
        'lot_time_remaining' => $lot_time_remaining
    ]);

$layout_content = render_page('layout',
    [
        'title' => 'Главная',
        'content' => $page_content,
        'navigation' => render_page('navigation', ['categories' => $categories])
    ]
);

print ($layout_content);

?>
