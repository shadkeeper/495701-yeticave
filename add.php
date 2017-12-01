<?php

require ('functions.php');
require ('data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $errors = [];
    $add_lot = $_POST;
    $add_required =
    [
        'name',
        'category',
        'cost',
        'cost_min',
        'url_img',
        'description',
        'data'
    ];

    foreach ($add_lot as $item => $value)
    {
        if (in_array($item, $add_required))
        {
            if (!$value)
            {
                $errors[$item] = 'Это поле нужно заполнить';
            }
        }
    }
    if (!empty($_FILES['url_img']['name']))
    {
        $tmp_name = $_FILES['url_img']['tmp_name'];
        $path = 'img/uploads/' . $_FILES['url_img']['name'];
        $type = $_FILES['url_img']['type'];
        $size = $_FILES['url_img']['size'];

        if ($size > 20000000)
        {
            $errors['url_img'] = 'Размер изображения не должен превышать 2 МБ';
        }
        elseif ($type !== 'image/png' && $type !== 'image/jpg' && $type !== 'image/jpeg')
        {
            $errors['url_img'] = 'Изображение должно быть в формате png или jpeg';
        }
        else
        {
            move_uploaded_file($tmp_name, $path);
            $add_lot['url_img'] = $path;
        }
    }
    else
    {
        $errors['url_img'] = 'Вы не выбрали файл';
    }

    if (count($errors))
    {
        $page_content = render_page('add',
            [
                'errors' => $errors,
                'lot' => $add_lot,
                'categories' => $categories
            ]);
    }
    else
    {
        $page_content = render_page('lot',
            [
                'lot' => $add_lot,
                'categories' => $categories,
                'bets' => $bets
            ]);
    }
}
else
{
    $page_content = render_page('add',
        [
            'categories' => $categories,
        ]);
}

$layout_content = render_page('layout',
[
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'title' => 'Добавить лот'
]);

print($layout_content);

?>