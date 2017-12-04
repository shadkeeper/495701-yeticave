<?php

require ('functions.php');
require ('data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $errors = [];
    $add_lot = $_POST;

    $validation_rules =
        [
            'name' => ['required'],
            'category' => ['required', 'cat'],
            'cost' => ['required', 'numeric'],
            'cost_min' => ['required', 'numeric'],
            'description'=> ['required'],
            'date' => ['required', 'date']
        ];
    foreach ($validation_rules as $valid => $rules)
        {
            if (array_key_exists($valid, $add_lot))
                {
                    foreach ($rules as $rule)
                        {
                            switch ($rule)
                                {
                                case 'required' : if (empty($add_lot[$valid]))
                                    {
                                        $errors[$valid] = 'Это поле нужно заполнить';
                                    }
                                    break;
                                case 'cat' : if ($add_lot[$valid] == 'Выберите категорию')
                                    {
                                        $errors[$valid] = 'Нужно выбрать категорию';
                                    }
                                    break;
                                case 'numeric' : if (!is_numeric($add_lot[$valid]))
                                    {
                                        $errors[$valid] = 'Введите числовое значение';
                                    }
                                    break;
                                case 'date' : if (!strtotime($add_lot[$valid]))
                                    {
                                        $errors[$valid] = 'Введите дату';
                                    }
                                    break;
                                }

                        }
                }
            else
                {
                    if (in_array('required',$rules))
                        {
                            $errors[$valid] = 'Это поле нужно заполнить';
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
            $errors['url_img'] = 'Изображение должно быть в формате PNG, JPEG или JPG';
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
                'categories' => $categories,
                'bets' => $bets
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
            'bets' => $bets
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