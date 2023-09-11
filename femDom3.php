<?php
//1е задание
//С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
/*$number = 0;
while($number <= 100) {
    if($number % 3 == 0){
        echo "$number </br>";
    }
    $number++;
}*/
//2е задание
/*С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
0 – ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.*/

function parityNum($num,$num2){

    $num = 0;
    do{
        if($num == 0){
            $str = " - ноль.</br>";
        }
        elseif($num % 2 == 0){
            $str = " - четное число.</br>";
        }else{
            $str = " - нечетное число.</br>";
        }
        echo $num . $str ;
        $num++;
    } while ($num <= $num2);

}
echo parityNum(1,10);
//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей,
// а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
//Московская область:
//Москва, Зеленоград, Клин
//Ленинградская область:
//Санкт-Петербург, Всеволожск, Павловск, Кронштадт
//Рязанская область …
$arr = array(
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Птербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Спасс-Рязанский', 'Кораблино', 'Сасово'],
);
foreach($arr as $kay => $v1) {
    $towns = implode(", ", $v1);
    echo    " $kay: </br> $towns </br>";
}
//4. Объявить массив, индексами которого являются буквы русского языка,
// а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк.

function transliteration($word)
{
    $letters = array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo',
        'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'iy', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'y', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh\'', 'ы' => 'iy', 'э' => 'ie', 'ю' => 'uy', 'я' => 'ia');
    $trans = strtr($word, $letters);
    return $trans;
}

echo transliteration("жопа");
//5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
function transliterate($string){

    $result = str_replace(' ', '_', $string);
    return $result;
}
echo transliterate('я сделал 5е задание');
//6. В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP.
// Необходимо представить пункты меню как элементы массива и вывести их циклом.
// Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.

//я сделал массив чисел, перемешал его, срезал что бы не очень много пунктов было и во вложенном меню
//реализовал простой вывод четности числа
echo '<ul>';
$num = range(0,10);
shuffle($num);
$num = array_slice($num, 0, 5);

foreach ($num as $value){

    echo "<li>$value</li>";
    if($value == 0){
        $str = 'это ноль';
        echo "<ul><li> $str </li></ul>";
    }
    elseif($value % 2 == 0){
        $str = 'четное число';
        echo "<ul><li> $str </li></ul>";
    }else{
        $str = 'нечетное число';
        echo "<ul><li> $str </li></ul>";
    }
}
echo '</ul>';