<?php include 'config.php';

    $name = $_POST["firstname"];
    $surname = $_POST["lastname"];
    $birthday = $_POST["birthday"];
    $country = $_POST["country"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];
    echo "<p>Ваше имя: <b>".$name . " " . $surname . "</b><?p>";
    echo "<p>Дата рождения: ".$birthday."</p>";
    echo "<p>Страна: ".$country."</p>";
    echo "<p>Почта: ".$email."</p>";
    echo $password == $password_repeat ? "Совпадает" : "Не совпал";
    echo "<br>";

    $add_sql = "INSERT INTO mytable (firstname, lastname, birthday, country, email, password)
     VALUES ('$name', '$surname', '$birthday', '$country', '$email', $password)";

    $add_result = $conn->query($add_sql);
    // Выполнение SQL-запроса
    $sql = "SELECT * FROM mytable";

    // Создаем объект $result, который представляет результат выполнения SQL-запроса
    $result = $conn->query($sql); //Этот объект будет содержать результаты запроса после его выполнения

    // Затем код проверяет, если есть какие-либо результаты после выполнения запроса
    if ($result->num_rows > 0) { 
        // Внутри блока if происходит перебор результатов запроса с помощью цикла while
        while ($row = $result->fetch_assoc()) {
            echo "Имя: " . $row["firstname"] . " " . $row["lastname"] . " Электронная почта: " . $row["email"] . " Дата: " . $row["birthday"];
        }
    // Если в результате запроса не было ни одной строки (то есть таблица пуста), то выполняется блок else
    } else {
        // Это сообщение будет выведено, чтобы сообщить пользователю, что в таблице нет данных
        echo "Нет результатов";
    }

    // Закрываем соединение с базой данных
    $conn->close();
?>