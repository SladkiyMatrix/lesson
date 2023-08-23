<?php
/*// Передаем текст напрямую
// Обрезаем текст, оставляя два символа
truncate('hexlet', 2)  // 'he...'
// Через переменную
$text = 'it works!'
// Обрезаем текст, оставляя четыре символа
$result = truncate($text, 4);
print_r($result); // => 'it w...'*/


    echo truncate('hexlet', 5);

    function truncate($str, $len)
    {
        $str = (string)$str;
        if (strlen($str) < $len)
        {
            $res = grad($len);
            echo "строка меньше $res символов";
            }
            elseif(strlen($str) == $len){
            echo $str;
            } else{
            $str = substr("$str", 0, $len);
             $result = $str . "...";
}
        return $result;
    }

function grad($len)
{
    $res = $len . '';
    $graduation = array('-го', '-х', '-и');
    switch (($len >= 20) ? $len % 10 : $len) {
        case 1:
            $res .= $graduation[0];
            break;
        case 2:
        case 3:
        case 4:
            $res .= $graduation[1];
            break;
        default:
            $res .= $graduation[2];
    }
    return $res;
}
//////////////////////////////////////////////////////////////////////////19-e
///Реализуйте функцию getHiddenCard(), которая принимает на вход номер кредитки, состоящий из 16 цифр, в виде строки и возвращает его скрытую версию,
///  которая может использоваться на сайте для отображения. Если исходная карта имела номер 2034399002125581, то скрытая версия выглядит так ****5581.
///  Другими словами, функция заменяет первые 12 символов на звездочки. Количество звездочек регулируется вторым необязательным параметром.
///  Значение по умолчанию — 4.
/// Для выполнения задания вам понадобится функция str_repeat(), которая повторяет строку указанное количество раз. str_repeat('o', 3); // "ooo"

//функция генерации случайного номера банковской карты и преобразования его в строку
$numbers = range(0, 22);
function cardNumber($numbers){

    shuffle($numbers);
    $arrStr = implode($numbers);
    $i = strlen($arrStr);
    if($i > 16){
        $arrStr = mb_substr($arrStr, 0, 16);
    }
    return $arrStr;
}


$card = cardNumber($numbers);
$stars = 4;
function getHiddenCard($card, $stars = 4){

        $code = str_repeat('*', $stars);
        $codeCard = mb_substr("$card", -4, 4);
        return $code . $codeCard;
}

echo getHiddenCard($card, $stars);
//20е задание, написать функцию которая возвращает разницу между двумя годами рождения в абсолютном виде(без знака)
//в пхп есть функци abs();
$year1 = rand(1950, 2023);
$year2 = rand(1950, 2023);
echo "$year1</br>$year2</br>";

function getAgeDifference($year1, $year2){
    $diff = $year1 - $year2;
    echo "$diff</br>";
    return abs($diff);
}

$actual = getAgeDifference($year1, $year2);
print_r($actual);
/////////////////////////////////////////////////////////////
/// 21e задание
/// Реализуйте функцию getFormattedBirthday(), которая принимает на вход три параметра:
/// день, месяц и год рождения. Она возвращает их строкой в отформатированном виде, например: 20-02-1953.
/// $result = getFormattedBirthday(20, 2, 1953);
/// print_r($result); // => 20-02-1953
/// День и месяц нужно форматировать так, чтобы при необходимости добавлялся 0 слева.
/// Например, если в качестве месяца пришла цифра 7, то в выходной строке она должна быть представлена как 07.
$day = rand(1, 31);
$month = rand(1, 12);
$year = rand(1950, 2023);

function getFormattedBirthday($day, $month, $year){
    $date = sprintf( '%02d-%02d-%04d', $day, $month, $year);
    return $date;
}

$result = getFormattedBirthday($day, $month, $year);
print_r($result);
