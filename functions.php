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
?>