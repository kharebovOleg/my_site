
<html>
<head>
<title>MY SITE</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="registration_page" style="height: 455px;">
        <button class="swithc_btn" id="swithc_btn">Сменить тему</button>
        <div class="main_head">
            <p class="first_line">Войти в WEB ID</p>
            <p class="second_line"><a href="#">Забыли WEB ID?</a></p>
        </div>
        <form class="fill_form" action="" method="POST">
            <input type="email" name="email" placeholder="Почта" required/>
            <input type="password" name="password" placeholder="Пароль" required/>
            <p id="or_text">ИЛИ</p>
            <div class="icons">
                <button><img src="images/VK Circled.png" alt="Иконка Вконтакте"></button>
                <button><img src="images/Telegram App.png" alt="Иконка Телеграм"></button>
                <button><img src="images/Instagram Circle.png" alt="Иконка Инстаграм"></button>
            </div>
            <button type="submit"  name="register" value="register" class="sbm_btn">Продолжить</button>
        </form>
        <?php
            session_start();
            include('config.php');
            if (isset($_POST['register'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
                $query->bindParam("email", $email, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
                if (!$result) {
                    ?>
                        <script type="text/javascript">
                            const elem = document.createElement('p');
                            elem.textContent = "Неверные пароль или почта!";
                            elem.style.color = 'red';
                            elem.classList.add('error_theme');
                            document.body.appendChild(elem);
                            alert("Неверные пароль или почта!");
                        </script>
                    <?php
                } else {
                    if (password_verify($password, $result['password'])) {
                        $_SESSION['user_id'] = $result['id'];
                        echo '<p id="success" style="visibility: hidden;">Здравствуйте ' . $result['firstname'] . '</p>';
                        ?>
                        <script type="text/javascript">
                            const elem = document.getElementById("success");
                            alert(elem.textContent);
                            alert("Авторизация прошла успешно!");
                        </script>
                        <?php
                    } else {
                        echo '<p class="error_theme" style="visibility: hidden;"> Неверные пароль или имя пользователя!</p>';
                        ?>
                        <script type="text/javascript">
                            alert("Неверные пароль или почта!");
                        </script>
                        <?php
                    }
                }
            }
        ?>
    </div>
    <script src="switch.js"></script>
</body>
</html>