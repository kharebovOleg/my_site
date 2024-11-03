
<html>
<head>
<title>MY SITE</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="registration_page">
    <button class="swithc_btn" id="swithc_btn">Сменить тему</button>
    <div class="main_head">
        <p class="first_line">Создание WEB ID</p>
        <p class="second_line">Уже есть WEB ID? <a href="#">Найти его здесь ></a></p>
    </div>
    <form class="fill_form" action="" method="POST">
        <input type="text" name="firstname" placeholder="Имя" required/>
        <input type="text" name="lastname" placeholder="Фамилия" required/>
        <div class="line1"></div>
        <input type="date" name="birthday" placeholder="Дата рождения"/>
        <input type="text" name="country" placeholder="Страна"/>
        <input type="email" name="email" placeholder="Почта" required/>
        <div class="line2"></div>
        <input type="password" name="password" placeholder="Пароль" required/>
        <input type="password" name="password_repeat" placeholder="Повторите пароль"/>
        <button type="submit"  name="register" value="register" class="sbm_btn">Продолжить</button>
    </form>
    <?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birthday = $_POST['birthday'];
        $country = $_POST['country'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password_repeat'];
        
        if($password == $password_repeat){
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                ?>
                    <script type="text/javascript">
                        const elem = document.createElement('p');
                        elem.textContent = "Пользователь с такой почтой уже существует";
                        elem.classList.add('error_theme');
                        document.body.appendChild(elem);
                    </script>
                <?php
            }
            if ($query->rowCount() == 0) {
                $query = $connection->prepare("INSERT INTO users(firstname,lastname,birthday,country,email,password)
                    VALUES (:firstname,:lastname,:birthday,:country,:email,:password_hash)");
                $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
                $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
                $query->bindParam("birthday", $birthday);
                $query->bindParam("country", $country, PDO::PARAM_STR);
                $query->bindParam("email", $email, PDO::PARAM_STR);
                $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                $result = $query->execute();
                if ($result) {
                    ?>
                    <script type="text/javascript">
                        const elem = document.createElement('p');
                        elem.textContent = "Регистрация прошла успешно";
                        elem.style.color = 'green';
                        elem.classList.add('error_theme');
                        document.body.appendChild(elem);
                    </script>
                <?php
                } else {
                    echo '<p class="error">Неверные данные!</p>';
                }
            }
        } else {
            echo '<p class="passfail">Пароли не совпадают</p>';
        }
    }
?>
</div>
<script src="switch.js"></script>
</body>
</html>