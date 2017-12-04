<?php

require ('data.php');
require ('functions.php');

$lot = null;
if (isset($_GET['id'])) {
	$lot_id = $_GET['id'];
	foreach ($goods as $item) {
		if ($item['id'] == $lot_id) {
			$lot = $item;
			break;
		}
	}
}
if (!$lot) {
	http_response_code(404);
}

$page_content = render_page('lot',
	[
		'lot' => $lot,
		'bets' => $bets
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

