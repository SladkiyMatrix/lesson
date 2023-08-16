<?php
//1е задание:
/*$a = 42;
$b = 17;

switch(true) {
    case $a >= 0 && $b >= 0:
      $a-=$b;
      echo $a;
      break;
      case $a <= 0 && $b <= 0:
      $a+=$b;
      echo $a;
        break;
        case (($a >= 0 && $b < 0) || ($a < 0 && $b >= 0)):
        $a+=$b;
        echo $a;
        break;
}*/
//2е задание:
/*$a = rand(0, 15);*/


//3е задание:
/*require_once('lib.php');

$form ='
        <form method="POST">
            <p>Введите первое число: <input type="text" name="num1" value="'. $_POST["num1"] .'"/></p>
			<p>Введите второе число: <input type="text" name="num2" value="'. $_POST["num2"] .'"/></p>
		    
            <input type="submit" name="operation" value="+">
            <input type="submit" name="operation" value="-">
            <input type="submit" name="operation" value="*">
            <input type="submit" name="operation" value="/">
            
            </form>';

echo $form;

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$op = $_POST['operation'];

if(!$op || (!$num1 && $num1 != '0') || (!$num2 && $num2 != '0')) {
    $error_form = 'не заполнены поля';
    echo $error_form;
}
else {
    if(!is_numeric($num1) || !is_numeric($num2)) {
        $error_form = 'ты знаешь разницу между числами и буквами?';
        echo $error_form;
    } else
        if ($num1 == 0 || $num2 == 0) {
            $error_form = 'не хорошечно на 0 делить';
            echo $error_form;
        }
    else
        switch ($op) {
            case  '+':
                echo sum($num1, $num2);
                break;
            case  '-':
                echo sub($num1, $num2);
                break;
            case  '/':
                echo div($num1, $num2);
                break;
            case  '*':
                echo smart($num1, $num2);
                break;
        }

}*/


//5е задание
?>
<!--<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Подвал</title>
    <link rel="stylesheet" href="stylefooter.css">
</head>
<body>
<p>Здесь Женёк получил по жопе, потому что засунул footer в body</p>
</body>
<footer id="footer">
    <?php
/*    echo "На дворе " . date('Y') . " год";
    */?>
</footer>
</html>-->

<?php
//6e zadanie
/*echo power(3,3);

function power($val, $pow){
    //ессли степень 0
    if ($pow == 0) {
        return 1;
    }
    //если стпень 1
    if ($pow == 1) {
        return $val;
    }
    //если отрицательное
    if($pow <0){
        return power(1/$val, -$pow);
    }

    return $val * power($val, $pow-1);

}*/
//7е задание
    /*echo date("H") . " часов " . date("i") . " минут";*/

    $hours = date("H");
    $minutes = date("i");
    function eTime($hours,$minutes){

        $arr = array (
            'H' => array(' час ', ' часа ', ' часов '),
            'i' => array(' минута', ' минуты', ' минут'),
        );

        switch(($hours >= 20) ? $hours % 10 : $hours)
        {
            case 1:
                $hours .= $arr['H'][0];
                break;
            case 2:
            case 3:
            case 4:
                $hours .= $arr['H'][1];
                break;
            default:
                $hours .= $arr['H'][2];


        }

        switch (($minutes >= 20) ? $minutes % 10 : $minutes) {
            case 1:
                $minutes .= $arr['i'][0];
                break;
            case 2:
            case 3:
            case 4:
                $minutes .= $arr['i'][1];
                break;
            default:
                $minutes .= $arr['i'][2];


        }
        return $hours . $minutes;
    }
echo eTime($hours, $minutes);
/*echo x(42 );
function x($x)
{

    $a = array(' час', ' часа', ' часов') ;

    switch(($x >= 20) ? $x % 10 : $x)
    {
        case 1:
              $x .= $a[0];
            break;
        case 2:
        case 3:
        case 4:
             $x .= $a[1];
            break;
        default:
              $x .= $a[2];


    }

    return $x;
}*/
?>



