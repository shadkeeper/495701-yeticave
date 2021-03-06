<?php

$is_auth = (bool)rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

date_default_timezone_set('Europe/Moscow');
$tomorrow = strtotime('tomorrow midnight');
$now = strtotime('now');
$remaining_seconds = $tomorrow - $now;
$hours = floor(($remaining_seconds % 86400) / 3600);
$minutes = floor(($remaining_seconds % 3600) / 60);
$lot_time_remaining = $hours . ":" . $minutes;

//массив категорий
$categories = [
    [
        'name' => 'Доски и лыжи',
        'class' => 'boards'
    ],
    [
        'name' => 'Крепления',
        'class' => 'attachment'
    ],
    [
        'name' => 'Ботинки',
        'class' => 'boots'
    ],
    [
        'name' => 'Одежда',
        'class' => 'clothing'
    ],
    [
        'name' => 'Инструменты',
        'class' => 'tools'
    ],
    [
        'name' => 'Разное',
        'class' => 'other'
    ]
];

//  двумерный массив объявлений
$goods = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'cost' => '10999',
        'cost_min' => '10000',
        'url_img' => 'img/lot-1.jpg',
        'img_alt' => 'Сноуборд',
        'date' => '2017-11-26',
        'description' => 'Доска Rossignol DISTRICT AMPTEK - отлично вариант для начинающих райдеров. 
                          Этот борд  хорошо подойдёт для парка, обычного склона, а также для обучения.  
                          Rossignol  сочетается с небольшим изгибом для прощая еще стабильной езды. 
                          Мягче симметричной,  гибкой делает ее простой в катании , и все это вместе  дает 
                          вам уверенность, чтобы прогрессировать свои навыки. Прогиб:Amptek Auto Turn - 
                          Смесь из 80% Rocker и 20% Camber создает весь горный рокер так что вы можете ездить
                           все в поле зрения с легкостью. Camber под креплениями позволяет делать много 
                           точных поворотов. Flex : 5/10 - Идеально подходит для всех горных трасс. Форма: 
                           Твин Фристайл - мягкие тейлы позволяют легко  контролировать доску , в то время как 
                           более жесткие участки под креплениями предлагают больше баланс.'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard	',
        'category' => 'Доски и лыжи',
        'cost' => '15999',
        'cost_min' => '15000',
        'url_img' => 'img/lot-2.jpg',
        'img_alt' => 'Сноуборд',
        'date' => '2017-12-31',
        'description' => 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком 
                            и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд 
                            отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим 
                            прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня 
                            сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от 
                            Шона Кливера еще никого не оставляла равнодушным.'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'cost' => '8000',
        'cost_min' => '7000',
        'url_img' => 'img/lot-3.jpg',
        'img_alt' => 'Крепление',
        'date' => '2017-12-31',
        'description' => 'Эти крепления разработаны при участии прорайдера Union Gigi Ruf. Модель Contact Pro, быстро 
                            стала одной из самых востребованных моделей креплений в коллекции Union. Очень легкие, 
                            не жесткие и минимально контактирующие с доской, они идеально подойдут райдерам, которым 
                            нужна полная свобода и чувство доски.'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'cost' => '10999',
        'cost_min' => '10000',
        'url_img' => 'img/lot-4.jpg',
        'img_alt' => 'Ботинки',
        'date' => '2017-12-31',
        'description' => 'Стильные технологичные ботинки MUTINY созданы для комфортного катания и отличной поддержки. 
                            Система эффективной шнуровки Direct Power Lacing для быстрой фиксации, мягкий лайнер и 
                            подошва из вспененного материала Contact Unilite, который гарантирует отличную амортизацию, 
                            а внутренние тросы-утяжки в районе лодыжки для дополнительной поддержки ноги. Если Вы 
                            любите скорость, то ботинки MUTINY для Вас!
'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'cost' => '7500',
        'cost_min' => '7000',
        'url_img' => 'img/lot-5.jpg',
        'img_alt' => 'Куртка',
        'date' => '2017-12-31',
        'description' => 'Простая и функциональная сноубордическая куртка с мембраной 5000 на 5000 имеет все, без чего 
                            катание будет не таким комфортным, а именно: немного утеплителя (80 г тело, 40 г рукава), 
                            капюшон с утяжками, несколько вместительных карманов, в том числе и внутренних и, конечно 
                            же, снегозащитную юбку - одну из важнейших вещей в сноубордической куртке.'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'cost' => '5400',
        'cost_min' => '5000',
        'url_img' => 'img/lot-6.jpg',
        'img_alt' => 'Маска',
        'date' => '2017-12-31',
        'description' => 'На Flight Deck инженеров Oakley вдохновили забрала шлемов лётчиков-истребителей. В 
                            результате, эта маска получила непревзойдённый угол обзора, широкий ремень с силиконовыми 
                            нитями для надёжной фиксации и механизм быстрой смены линз. Дополнительный бонус: маска 
                            совместима с большинством моделей шлемов для катания.'
    ]
];

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

?>