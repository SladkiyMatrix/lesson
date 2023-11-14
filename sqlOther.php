<?php
//подключение к локальному серверу
$servername = 'localhost';
//имя пользователя
$username = 'root';
//пароль
$password = '';
//создаем переменную
$connect = mysqli_connect($servername, $username, $password = '');
//если перемення попала в connect_error
if ($connect->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
//создаем БД с именем test01
$sql = "CREATE DATABASE test01";
//делаем запрос
if (mysqli_query($connect,$sql)) {
    //если все нормально
    echo "База данных успешно создана";
} else {
    //если ничего не нормально  выводим ошибку
    echo "Ошибка " . mysqli_error($connect);
}
//закрыли соединение
//mysqli_close($connect);