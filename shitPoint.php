<?php

$russia = [
    'Московская область' => ['Москва', 'кабанино', 'Зеленоград', 'Клин', 'Коломна', 'Карлик', 'кременчуг'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт', 'кировск', ],
    'Рязанская область' => ['Рязань', 'Михайлов', 'Кораблино', 'Ряжск', 'кожемяка', 'кожный червь', 'Кашино-Залупино'],
    'Тверская область' => ['Тверь', 'Ржев', 'Торжок', 'Бологое', 'Новая Калоприемка', 'нижние залупки', 'Верхний-Кал'],
];

/**
 * @param $town 
 * @param $upperNeedle
 * @param $lowerNeedle
 * @return bool
 */
function lettersearch($town, $upperNeedle, $lowerNeedle){
   return (str_starts_with($town, $upperNeedle)) || (str_starts_with($town, $lowerNeedle));
}

echo townsearch($russia, 'к');


/**
 * @param $arraytown //массив городов
 * @param $needle // буква на которую будем искать
 * @return string
 */
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
                        if (lettersearch($townS, $upperNeedle, $lowerNeedle)) {
                            //Добавляем в список
                            $townListShit = $townListShit . $town . ',';
                            //цифра после continue - на скольких уровнях вложенных циклов будет пропущена оставшаяся часть итерации
                            continue 3;
                        }
                    }
                }
            }

            //Здесь проверяем на наличие нужного символа в начале каждого слова
            if (lettersearch($town, $upperNeedle, $lowerNeedle)) {
                //Добавляем в список
                $townListShit = $townListShit . $town . ',';
            }
        }

    }
    return $townListShit;
}
