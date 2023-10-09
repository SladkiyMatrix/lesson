<?php
/*$russia = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин', 'Коломна'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Михайлов', 'Кораблино', 'Ряжск'],
    'Тверская область' => ['Тверь', 'Ржев', 'Торжок', 'Бологое']
];

foreach($russia as  $towns) {

    foreach ($towns as  $town) {

        if(strstr($town, "К")) {

            $s = ' ';
            $kay = $town . $s;
            //echo $kay;
            $kayArr = explode(' ', $kay);
            foreach ($kayArr as $k){
                if($k == end($kayArr)){
                    echo $k . '.';
                }
                echo $k . ',';
            }

            }

        }
    }*/
$russia = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин', 'Коломна', 'Карлик'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Михайлов', 'Кораблино', 'Ряжск'],
    'Тверская область' => ['Тверь', 'Ржев', 'Торжок', 'Бологое'],
];

$townlist = '';

foreach ($russia as $towns) {

    foreach ($towns as $town) {

        if (stristr($town, "к")) {
            $townlist = $townlist . $town . ',';
        }
    }
}
$townsk = explode(',', $townlist);
print_r($townsk);
echo "<br>";
/*$townlist = substr_replace($townlist,'.',-2);
echo $townlist;*/
$townlistK = '';
foreach ($russia as $towns) {

    foreach ($towns as $town) {

        if (strstr($town, "К")) {
            $townlistK = $townlistK . $town . ',';
        }
    }
}

$townsK= explode(',', $townlistK);
print_r($townsK);
$array = array_unique (array_merge ($townsk, $townsK));
echo "<br>";
print_r($array);
echo "<br>";
unset($array[7]);
echo "<br>";
$str = implode(', ', $array);
echo $str . '.';
echo "<br>";
$russia = [
    'Московская область' => ['Москва', 'кабанино', 'Зеленоград', 'Клин', 'Коломна', 'Карлик', 'кременчуг'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт', 'кировск', ],
    'Рязанская область' => ['Рязань', 'Михайлов', 'Кораблино', 'Ряжск', 'кожемяка', 'кожный червь'],
    'Тверская область' => ['Тверь', 'Ржев', 'Торжок', 'Бологое'],
];
$townliSthit = '';
foreach ($russia as $towns) {

    foreach ($towns as $town) {
        array_map('strtolower', $towns);

        if (strstr($town, "к")) {

            $townliSthit = $townliSthit . $town . ',';
        }
    }
}
echo $townliSthit;