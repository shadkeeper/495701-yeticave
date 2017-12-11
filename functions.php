<?php

/**
 * @param $tpl
 * @param null $massive
 * @return string
 * @throws Exception
 */
function render_page($tpl, $massive = null)
{
    if (is_file($path = __DIR__ . '/templates/' . $tpl . '.php.')) {
        ob_start('ob_gzhandler' );
        extract($massive);
        include $path;
        return ob_get_clean();
    }
    else {
            throw new \Exception('Такого файла нету в директории /templates/ ' . $tpl . '.php');
    }
};

date_default_timezone_set('Europe/Moscow');

function timeFun($timefun)
{
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

function timeEnd($date)
{
    $end_date = strtotime($date);
    $now = strtotime('now');
    $remainingSeconds = $end_date - $now;
    $days = floor(($remainingSeconds / 86400));
    $hours = floor(($remainingSeconds % 86400) / 3600);
    $minutes = floor(($remainingSeconds % 3600) / 60);
    $time_end = $days . ":" . $hours . ":" . $minutes;
    return $time_end;
}

function validateUser($email, $users)
{
    $user_seach = null;
    foreach ($users as $user)
    {
        if ($user['email'] == $email)
        {
            $user_seach = $user;
            break;
        }
    }
    return $user_seach;
}

?>