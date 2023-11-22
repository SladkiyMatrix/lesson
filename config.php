<?php
define('DBSERVER', 'localhost'); // сервер с базой данных
define('DBUSERNAME', 'root'); // имя пользователя
define('DBPASSWORD', ''); // пароль
define('DBNAME', 'hehe'); // название базы

/* соединяемся с базой */
$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

// проверяем соединение
/*
if($db === false){
    die("Ошибка соединения с базой. " . mysqli_connect_error());
}*/
//если перемення попала в connect_error
if ($db->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
//создаем таблицу с именем new_user и полями
$sql = "
CREATE TABLE new_users (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(75) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
    );";
//делаем запрос
if (mysqli_query($db,$sql)) {
    //если все нормально
    echo "База данных успешно создана";
} else {
    //если ничего не нормально  выводим ошибку
    echo "Ошибка " . mysqli_error($db);
}
//закрыли соединение
//mysqli_close($db);

//Сообщение об ошибка, которые у нас могут возникнуть, вначалае пустое
$error = ' ';
//наша форма регистрации
$form = '
        <form action="" method="POST">
            <h2>Регистрация</h2>
                    <p>Заполните все поля, чтобы создать новый аккаунт.</p>
            <label>Имя</label><br>
                <input type="text" name="name"><br>
            <label>Электронная почта</label><br>
                <input type="email" name="email"><br>
            <label>Пароль</label><br>
                <input type="password" name="password"><br>
            <label>Повторите пароль</label><br>
                <input type="password" name="confirm_password"><br><br>
            <input type="submit" name="submit"  value="Зарегистрироваться">       
            
        </form>';
//выводим форму
echo $form;
//проверка на то, введены ли данные в форму
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //делаем пустые переменные с ошибками
    $nameError = $emailError = $passwordError = $confirm_passwordError = $fullError = "";
    //trim удаляет пробелы из начала строки
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST["confirm_password"]);
    //проверяе заполнены ли все поля перед отправкой формы
    if (empty($name . $email . $password . $confirm_password)) {
        $fullError = 'Вы не заполнили поля' . "<br>";
    }else {
        //теперь поверяем все поля по отдельности на то какие из них не заполнены
        if (empty($name)) {
            $nameError = 'Введите  имя' . "<br>";
        }
        if (empty($email)) {
            $emailError = 'Введите email' . "<br>";
        }
        if (empty($password)) {
            $passwordError = 'Введите  пароль' . "<br>";
        }
        if (empty($confirm_password)) {
            $confirm_passwordError = 'Введите  пароль второй раз' . "<br>";
        }
    }
    //выводим ошибки если есть
    echo $fullError;
    echo  $nameError;
    echo $emailError;
    echo $passwordError;
    echo $confirm_passwordError;
}