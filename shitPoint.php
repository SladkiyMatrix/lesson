<?php

//ща нормально сделаем
$russia = [
    'Московская область' => ['Москва', 'кабанино', 'Зеленоград', 'Клин', 'Коломна', 'Карлик', 'кременчуг'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт', 'кировск', ],
    'Рязанская область' => ['Рязань', 'Михайлов', 'Кораблино', 'Ряжск', 'кожемяка', 'кожный червь', 'Кашино-Залупино'],
    'Тверская область' => ['Тверь', 'Ржев', 'Торжок', 'Бологое', 'Новая Калоприемка', 'нижние залупки', 'Верхний-Кал'],
];
/*$townListShit = '';
foreach ($russia as $towns) {

    foreach ($towns as $town) {
        $space = ' ';
        if(str_contains($town, $space)){
            $townSpace = explode(' ', $town);
            foreach ($townSpace as $townS) {
                if (str_starts_with($townS, 'к') || (str_starts_with($townS, 'К'))) {
                    $str = implode(' ', $townSpace);
                    $townListShit = $townListShit . $str . ',';
                }
            }
        }
        if (str_starts_with($town, 'к') || (str_starts_with($town, 'К'))) {

                $townListShit = $townListShit . $town . ',';
        }
    }
}
echo $townListShit;*/
echo townsearch($russia, 'к');


function townsearch($arraytown, $needle): string {
    $separators = [' ', '-'];

    $upperNeedle = mb_strtoupper($needle);
    $lowerNeedle = mb_strtolower($needle);
    $townListShit = '';

    //Перебираем основной массив
    foreach ($arraytown as $towns) {

        //Перебираем массив в массиве
        foreach ($towns as $town){

            //перебираем массив с разделителями $seporators
            foreach($separators as $seporator){

                // проверям есть ли разделитель в словах
                if(str_contains($town, $seporator)){

                    //если нашли то разбираем слова по разделителю
                    $townSeporator = explode($seporator, $town);

                    //перебираем слова из значений массива $townSeporator
                    foreach ($townSeporator as $townS){

                        //Здесь проверяем есть ли заданный символ из $needle в начале каждого слова
                        if ((str_starts_with($townS, $upperNeedle)) || (str_starts_with($townS, $lowerNeedle))) {
                            //Добавляем в список
                            $townListShit = $townListShit . $town . ',';
                            //var_dump($townListShit);

                        }

                    }

                }
                continue;
            }

            //Здесь проверяем на наличие нужного символа в начале каждого слова
            if ((str_starts_with($town, $upperNeedle)) || (str_starts_with($town, $lowerNeedle))) {
                //Добавляем в список
                $townListShit = $townListShit . $town . ',';
            }
        }

    }
    return $townListShit;
}
