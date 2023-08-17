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