<?php
$is_auth = (bool)rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

date_default_timezone_set('Europe/Moscow');
$tomorrow = strtotime('tomorrow midnight');
$now = strtotime('now');
$remaining_seconds = $tomorrow - $now;
$hours = floor(($remaining_seconds % 86400) / 3600);
$minutes = floor(($remaining_seconds % 3600) / 60);
$lot_time_remaining = $hours . ":" . $minutes;

//массив категорий
$categories = [
    [
        'name' => 'Доски и лыжи',
        'class' => 'boards'
    ],
    [
        'name' => 'Крепления',
        'class' => 'attachment'
    ],
    [
        'name' => 'Ботинки',
        'class' => 'boots'
    ],
    [
        'name' => 'Одежда',
        'class' => 'clothing'
    ],
    [
        'name' => 'Инструменты',
        'class' => 'tools'
    ],
    [
        'name' => 'Разное',
        'class' => 'other'
    ]
];

//  двумерный массив объявлений
$goods = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'cost' => '10999',
        'url_img' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard	',
        'category' => 'Доски и лыжи',
        'cost' => '159999',
        'url_img' => 'img/lot-2.jpg'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'cost' => '8000',
        'url_img' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'cost' => '10999',
        'url_img' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'cost' => '7500',
        'url_img' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'cost' => '5400',
        'url_img' => 'img/lot-6.jpg'
    ]
];

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
        'content' => $page_content
    ]
);

print ($layout_content);

?>
