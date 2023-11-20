<?php
//подключение к локальному серверу
$servername = 'localhost';
//имя пользователя
$username = 'root';
//пароль
$password = '';
//создаем экзмепляр класса
$connect = new mysqli($servername, $username, $password = '');
//если перемення попала в connect_error
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
//создаем БД с именем test01
$sql = "CREATE DATABASE test01";
//хотел написать полностью БД, но выдается ошибка о том что sql не настроен
/*$sql = "CREATE TABLE newTable(
    table_id INT PRIMARY KEY AUTO_INCREMENT,
    table1 VARCHAR(10),
    table2 DECIMAL(8,2),
    table3 INT
    );";*/
//делаем запрос
if ($connect->query($sql)===TRUE) {
    //если все нормально
    echo "База данных успешно создана";
} else {
    //если ничего не нормально  выводим ошибку
    echo "Ошибка " . $connect->error;
}
//закрыли соединение
//mysqli_close($connect);
//я люблю собак