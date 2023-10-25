<?php
// массив городов
$russia = [
    'Московская область' => ['Москва', 'кабанино', 'Зеленоград', 'Клин', 'Коломна', 'Карлик', 'кременчуг'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт', 'кировск', ],
    'Рязанская область' => ['Рязань', 'Михайлов', 'Кораблино', 'Ряжск', 'кожемяка', 'кожный червь', 'Кашино-Залупино'],
    'Тверская область' => ['Тверь', 'Ржев', 'Торжок', 'Бологое', 'Новая Калоприемка', 'нижние залупки', 'Верхний-Кал'],
];

/**
 * @param $town // переменная которую перебираем в массиве
 * @param $upperNeedle // буква в верхнем регистре
 * @param $lowerNeedle // буква в нижнем регистре
 * @return bool
 */
//функция для проверки с какой буквы начинается перемнная
function lettersearch($town, $upperNeedle, $lowerNeedle){
   return (str_starts_with($town, $upperNeedle)) || (str_starts_with($town, $lowerNeedle));
}
//echo townsearch($russia, 'к');

/**
 * @param $arraytown //массив городов
 * @param $needle // буква на которую будем искать
 * @return string
 */
//функция поиска городов из массива $arraytown, на введенную пользователем букву $needle
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

                        //Здесь проверяем есть ли заданный символ из $needle в начале каждого слова, функцией lettersearch
                        if (lettersearch($townS, $upperNeedle, $lowerNeedle)) {
                            //Добавляем в список
                            $townListShit = $townListShit . $town . ',';
                            //цифра после continue - на скольких уровнях вложенных циклов будет пропущена оставшаяся часть итерации
                            continue 3;
                        }
                    }
                }
            }

            //Здесь проверяем на наличие нужного символа в начале каждого слова, функцией lettersearch
            if (lettersearch($town, $upperNeedle, $lowerNeedle)) {
                //Добавляем в список
                $townListShit = $townListShit . $town . ',';
            }
        }

    }
    //функция возвращает все нужные названия городов и меняет последнюю запятую на точку
    return substr_replace($townListShit, '.', -1, 1);
}
// maxlength=1 можно ограничить в форме ввод символов, но это слишком просто
$form = '
        <form method="get">
            <p>Введите первую букву города, который хотите найти</p>
            <p><input type="text" name="town"  placeholder="Введите первую букву" value="' . $_GET["town"] . '"/></p>
            <input type="submit" value="Найти">
            
        </form>';
//вывод формы на экран
echo $form;
//переменная принимает значение которое ввёл пользователь
$letterTown = $_GET["town"];
//засунул функцию в  перемнную, что бы вызвать в функции проверки на входищие символы от пользователя(lenghtown($letterTown))
$funcSearch = townsearch($russia, $letterTown);

/**
 * @param $letterTown // буква введенная пользователем
 * @return string
 */
// функция проверки введенной пользователем буквы
function lenghtown($letterTown): string {
    // проверка, пустое ли поле ввода, если жамкнуть по кнопке найти,
    if (!empty($_GET["town"])) {
        $letterTown = $_GET["town"];
    } else {
        $boom = "не пытайся меня обмануть и вводи букву, но только одну";
        return $boom;
    }
    //проверка iconv_strlen проверяет введен ли 1 символ, а mb_detect с кодировкой русских символов
    // отличие iconv от strlen в том что strlen проверяет на количество байтов, а в iconv можно указать кодировку и она проверяет именно символ
    if( (iconv_strlen($letterTown, 'UTF-8')) == 1 && (mb_detect_encoding($letterTown, 'KOI8-R'))){
        // сделал переменную глобальной что бы вызвать её без ошибок в функции, другого способа не нашел
        //точнее нашел, но там класс использовать предлагали, потм побольше про них прочитаю
        global $funcSearch;
        //возвращает нашу функцию писка городов на нужную нам букву
        return $funcSearch;

    }else{
        $errorForm = 'это не буква русского алфавита, или ты ввёл больше одной';
        //возвраает строку, если введенный символ не прошел проверку
        return $errorForm;
    }
}
echo lenghtown($letterTown);

//проверка как работает функция mb_detect_encoding
/*$str = 'Jopa';
function encod($str){
    if(mb_detect_encoding($str, 'KOI8-R')){
        echo "$str - написано по русски";
    }else{
        echo "сука, нихуя не по-русски";
    }
}
echo encod($str);*/