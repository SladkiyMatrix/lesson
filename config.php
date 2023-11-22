<?php
define('DBSERVER', 'localhost'); // сервер с базой данных
define('DBUSERNAME', 'root'); // имя пользователя
define('DBPASSWORD', ''); // пароль
define('DBNAME', 'hehe'); // название базы

//соединение с базой
$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

// проверяем соединение
/*
if($db === false){
    die("Ошибка соединения с базой. " . mysqli_connect_error());
}*/
//проверка соединения, если есть ошибки при установке соединения, то завершаем скрипт и выводим сообщение с ошибкой
if ($db->connect_error) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
//создаем таблицу с именем users и полями
$sql = "
CREATE TABLE users (
    users_id int(11)  NOT NULL AUTO_INCREMENT,
    name varchar(75) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(100) NOT NULL,
    PRIMARY KEY (users_id)
    );";
//делаем запрос
if (mysqli_query($db,$sql)) {
    //если все нормально
    echo "таблица успешно создана ";
} else {
    //если ничего не нормально  выводим ошибку
    echo "Ошибка: " . mysqli_error($db) . ' |';
}

// проверяем есть ли интересующая наст таблица в БД
//название таблицы
$tableName = 'users';
//запрос к структуре таблицы с именем таблицы $tableName
$query = "DESCRIBE $tableName";
//сохраняем запрос в переменную
$resultQuery = mysqli_query($db, $query);
//проверяем есть ли таблица
if ($resultQuery->num_rows > 0){
    echo ' таблица ' . $tableName . ' сущствует';
}
//закрыли соединение
//mysqli_close($db);

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
        echo $fullError;
    } else {
        //теперь поверяем все поля по отдельности на то какие из них не заполнены
        if (empty($name)) {
            $nameError = 'Введите  имя' . "<br>";
            echo  $nameError;
        }
        if (empty($email)) {
            $emailError = 'Введите email' . "<br>";
            echo $emailError;
        }
        if (empty($password)) {
            $passwordError = 'Введите  пароль' . "<br>";
            echo $passwordError;
        } else {
            if (strlen($password) < 3) {
                $error = 'пароль не может быть меньше 3х символов'. "<br>";
                echo $error;
            }

                }
        if (empty($confirm_password)) {
            $confirm_passwordError = 'подтвердите пароль' . "<br>";
            echo $confirm_passwordError;
        } else {
            if ($password != $confirm_password ){
                echo 'пароли не совпадают';
            }
        }

    }

}