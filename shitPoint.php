<?php
$russia = [
    'Московская область' => ['Москва', 'кабанино', 'Зеленоград', 'Клин', 'Коломна', 'Карлик', 'кременчуг'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт', 'кировск', ],
    'Рязанская область' => ['Рязань', 'Михайлов', 'Кораблино', 'Ряжск', 'кожемяка', 'кожный червь'],
    'Тверская область' => ['Тверь', 'Ржев', 'Торжок', 'Бологое', 'Новая Калоприемка', 'нижние залупки'],
];
echo town_search($russia, 'к');

/**
 * @param $arraytowns
 * @param $needle
 * @return string
 */
function town_search($arraytowns, $needle): string {
    $separators = [' ', '-', ''];
    $upperNeedle = mb_strtoupper($needle);
    $lowerNeedle = mb_strtolower($needle);

    $townListShit = '';
    //Перебираем основной массив
    foreach ($arraytowns as $towns) {

        //Перебираем массив в массиве
        foreach ($towns as $town) {
            //перебираем разделители $seporators
            foreach ($separators as $seporator){

                //Ищем строку с пробелом, тире  и т.д. среди значений массива
                if (str_contains($town, $seporator)) {

                    //Если нашли, то разбираем слова, разделенные пробелом на массив
                    $townSpace = explode(' ', $town);

                    //Перебираем слова из значения массива
                    foreach ($townSpace as $townS) {

                        //Здесь проверяем на наличие нужного символа в начале каждого слова
                        if (str_starts_with($townS, $upperNeedle)  (str_starts_with($townS, $lowerNeedle))) {
                            //Добавляем в список
                            $townListShit = $townListShit . $town . ',';
                        }
                    }
                    continue;
            }
                //Здесь проверяем на наличие нужного символа в начале каждого слова
                if (str_starts_with($town, $upperNeedle)  (str_starts_with($town, $lowerNeedle))) {
                    //Добавляем в список
                    $townListShit = $townListShit . $town . ',';
                }

            }


        }
    }
    return $townListShit;
}
