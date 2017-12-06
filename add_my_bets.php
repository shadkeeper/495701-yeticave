<?php

include ('functions.php');
include ('data.php');

$add_my_bets_massive = [];

if(isset($_COOKIE['add_my_bets']))
{
    $add_my_bets_massive = json_decode($_COOKIE['add_my_bets'], true);
}

$page_content = render_page ('add_my_bets',
    [
        'add_my_bets_massive' => $add_my_bets_massive,
        'categories' => $categories,
        'goods' => $goods,
    ]);

$layout_content = render_page ('layout',
    [
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'title' => 'Мои ставки',
        'content' => $page_content,
        'navigation' => render_page('navigation', ['categories' => $categories])
    ]);

print ($layout_content);