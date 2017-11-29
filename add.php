<?php

require ('data.php');
require ('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $add = $_POST;

    if (isset($_FILES['url_img']['name'])) {
        $path = $_FILES['url_img']['name'];
        $res = move_uploaded_file($_FILES['url_img']['tmp_name'], 'img/' . $path);
    }

    if (isset($path)) {
        $add['url_img'] = $path;
    }

    $page_content = render_page('lot', ['add' => $add]);
}
else {
    $page_content = render_page('add', []);
}


$layout_content = render_page('layout',
    [
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'content'    => $page_content,
        'title'      => 'Добавление лота'
]);

print($layout_content);

?>