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

?>