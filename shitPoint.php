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
    return $townListShit;
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
    //проверка iconv_strlen проверяет введен ли 1 символ, а регулярное выражение - введен ли на кириллице
    // отличие iconv от strlen в том что strlen проверяет на количество байтов, а в iconv можно указать кодировку и она проверяет именно символ
    if( (iconv_strlen($letterTown, 'UTF-8')) == 1 && (preg_match("/^[А-Яа-я]+$/u", $letterTown))){
        // сделал переменную глобальной что бы вызвать её без ошибок в функции, другого способа не нашел
        //точнее нашел, но там класс использовать предлагали, потм побольше про них прочитаю
        global $funcSearch;
        //возвращает нашу функцию писка городов на нужную нам букву
        return $funcSearch;

    }else{
        $errorForm = 'это не буква русского алфавита';
        //возвраает строку, если введенный символ не прошел проверку
        return $errorForm;
    }
}
echo lenghtown($letterTown);
//////////////////////////////////////////////////////
/// для php ниже 8го
$russia = [
    'Московская область' => ['Москва', 'кабанино', 'Зеленоград', 'багровые какахи', 'Клин', 'Коломна', 'Карлик', 'кременчуг'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт', 'кировск'],
    'Рязанская область' => ['Рязань', 'Михайлов', 'Кораблино', 'Ряжск', 'кожемяка', 'кожный-червь'],
    'Тверская область' => ['Тверь', 'Ржев', 'Торжок', 'Бологое', 'Новая Калоприемка', 'нижние_залупки'],
];
//Функция поиска первой буквы в двух регистрах в названии города , проверяет либо найден либо нет
/**
 * @param $townArray // Проверяем город на совпадение с нужной буквой
 * @param $needUpLetter // Нужная буква в верхнем регистре
 * @param $needLowLetter // Нужная буква в нижнем регистре
 * @return bool
 */
function searchLetter($townArray, $needUpLetter, $needLowLetter): bool
{
    return (mb_stripos($townArray, $needUpLetter) === 0 || mb_stripos($townArray, $needLowLetter) === 0);
}

//Функция поиска из массива городов, по нужной букве
/**
 * @param $arraytowns // Массив с названием городов
 * @param $needle // Нужная буква
 * @return string
 */

function townsearch($arraytowns, $needle): string
{
    $separators = [' ', '_', '-'];
    $result = '';
    //Для поиска по букве в двух регистрах
    $upperNeedle = mb_strtoupper($needle);
    $lowerNeedle = mb_strtolower($needle);
    //Перебираем главный массив
    foreach ($arraytowns as $towns) {
        //Перебираем под массив
        foreach ($towns as $town) {
            //Перебираем массив с разделителями
            foreach ($separators as $separator) {

                //Если символ находится в названии города
                if (strpos($town, $separator)) {
//Получаем массив названий городов с $separator  в виде разделителя
                    $separatetownname = explode($separator, $town);
                    //Перебираем массив городов с разделителем, для поиска первой буквы во втором слове названия города
                    foreach ($separatetownname as $name) {
                        //Если буква в любом регистре является первой в названии города
                        if (searchLetter($name, $upperNeedle, $lowerNeedle)) {
                            //Записываем в переменную $result каждое название города, начинающееся на нужную букву через запятую
                            $result .= ' ' . $town . ',';
                            break;
                        }
                    }
                    continue 2;
                }
            }

            //Если буква в любом регистре является первой в названии города
            if (searchLetter($town, $upperNeedle, $lowerNeedle)) {
                //Записываем в переменную $result каждое название города, начинающееся на нужную букву через запятую
                $result .= ' ' . $town . ',';
            }
        }
    }
    //функция возвращает все нужные названия городов и меняет последнюю запятую на точку
    return substr_replace($result, '.', -1, 1);

}
$searchForm = '
<form method="get">
<h2>Введите букву</h2>
<p><input type="text" name="town" placeholder="Введите букву" value="'.$_GET["town"].'"></p>
<input type="submit" value="Поиск">
<input type="reset" value="Удалить">
</form>';
$getLetter = "";
echo $searchForm;


// если поле ввода не пусто
if (!empty($_GET["town"])) {
    $getLetter = $_GET["town"];
} else {
    echo '<h2>Вы еще ничего не ввели</h2>';
    die();
}


echo townsearch($russia, $getLetter);