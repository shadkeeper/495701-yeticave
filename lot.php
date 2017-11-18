<?php
$is_auth = (bool)rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

date_default_timezone_set('Europe/Moscow');
function timeFun($timefun) {
    $now = strtotime('now');
    $fun = ($now - $timefun) / 60;
    if ($fun / 60 < 24) {
        if ($fun < 60) {
            $tsr = ceil($fun) . ' минут назад';
        } else {
            $tsr = ceil($fun / 60) . ' часов назад';
        }
    }
    else {
           $tsr = date("d:m:y в H:i", $timefun);
        }
    return $tsr;
};

require ('functions.php');

$page_content = render_page('lot',['bets' => $bets]);

$layout_content = render_page('layout',
    [
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'content' => $page_content,
        'title' => 'DC Ply Mens 2016/2017 Snowboard'
    ]
);

print ($layout_content);

?>

