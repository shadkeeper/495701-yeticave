<?php

require ('data.php');
require ('functions.php');

$lot = (isset($_GET['id']) && isset($goods[$_GET['id']])) ? $goods[$_GET['id']] : null;

if (!$lot) {
    http_response_code(404);
}

$bet_add = true;
$bet_error = [];

if(isset($_COOKIE['add_my_bets']))
{
    $add_my_bets_massive = json_decode($_COOKIE['add_my_bets'], true);
    if(array_key_exists($_GET['id'], $add_my_bets_massive))
    {
        $bet_add = false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(intval($_POST['cost']) >= $lot['cost_min'])
    {
        $bet_new =
            [
                'name' => $lot['name'],
                'category' => $lot['category'],
                'cost' => $_POST['cost'],
                'url_img' => $lot['url_img'],
                'id' => $_GET['id'],
                'lot_end_date' => $lot['date'],
                'bet_date' => strtotime('now'),
            ];
        $add_my_bets_massive[$_GET['id']] = $bet_new;
        setcookie('add_my_bets', json_encode($add_my_bets_massive), time() + (86400 * 30), '/');
        header('Location: add_my_bets.php');
    } else {
        $bet_error = 'Ставка доджна быть не меньше минимальной ставки';
    }
}

$page_content = render_page ('lot',
    [
        'categories' => $categories,
        'bets' => $bets,
        'lot' => $lot,
        'bet_add' => $bet_add,
        'bet_error' => $bet_error
    ]);

$layout_content = render_page('layout',
	[
    	'is_auth' => $is_auth,
    	'user_name' => $user_name,
    	'user_avatar' => $user_avatar,
		'content' => $page_content,
		'title' => 'Лот №' . $lot['id'] . ' - ' . $lot['name'],
		'navigation' => render_page('navigation', ['categories' => $categories])
	]);

print($layout_content);

?>

