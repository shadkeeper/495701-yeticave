<?php

require ('data.php');
require ('functions.php');

$page_content = render_page('index',
    [
        'categories' => $categories,
        'goods' => $goods,
        'lot_time_remaining' => $lot_time_remaining
    ]);

$layout_content = render_page('layout',
    [
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'title' => 'Главная',
        'content' => $page_content,
        'navigation' => render_page('navigation', ['categories' => $categories])
    ]
);

print ($layout_content);

?>
