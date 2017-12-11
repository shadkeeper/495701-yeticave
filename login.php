<?php

require ('data.php');
require ('functions.php');
require ('userdata.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;
    $required = ['email', 'password'];
    $errors = [];
    foreach ($required as $name)
    {
        if (!array_key_exists($name, $form) || empty($form[$name]))
        {
            $errors[$name] = 'Введите свое имя';
        }
    }
    if (!empty($form['email'])) {
        if ($user = validateUser($form['email'], $users)) {
            if (password_verify($form['password'], $user['password'])) {
                $_SESSION['user'] = $user;
            }
            else if (!empty($form['password'])) {
                $errors['password'] = 'Неверный пароль';
            }
        }
        else {
            $errors['email'] = 'Пользователь не найден';
        }
    }
    if (count($errors)) {
        $page_content = render_page('login',
            [
                'form' => $form,
                'errors' => $errors,
                'categories' => $categories,
            ]);
    }
    else {
        header("Location: index.php");
        exit();
    }
}
else {
    $page_content = render_page('login',
        [
            'categories' => $categories,
        ]);
}

$layout_content = render_page('layout',
    [
        'title' => 'Вход на сайт',
        'content' => $page_content,
        'navigation' => render_page('navigation', ['categories' => $categories])
    ]);

print ($layout_content);

?>