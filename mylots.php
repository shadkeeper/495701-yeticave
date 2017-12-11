<?php

include ('functions.php');
include ('data.php');

session_start();

$add_my_bets_massive = [];

if(isset($_COOKIE['mylots']))
{
    $add_my_bets_massive = json_decode($_COOKIE['mylots'], true);
}

$page_content = render_page ('mylots',
    [
        'add_my_bets_massive' => $add_my_bets_massive,
        'categories' => $categories,
        'goods' => $goods
    ]);

$layout_content = render_page ('layout',
    [
        'title' => 'Мои ставки',
        'content' => $page_content,
        'navigation' => render_page('navigation', ['categories' => $categories])
    ]);

print ($layout_content);

?>