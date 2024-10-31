<!DOCTYPE html>
<html>
<head>
<title>MY SITE</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="registration_page">
    <div class="registration_head">
        <p class="main_theme">Создание WEB ID</p>
        <p class="go_to_authorithation">Уже есть WEB ID? <a href="#">Найти его здесь ></a></p>
    </div>
    <form class="registration_form" action="display.php" method="POST">
        <input type="text" name="firstname" placeholder="Имя"/>
        <input type="text" name="lastname" placeholder="Фамилия"/>
        <input type="date" name="birthday" placeholder="Дата рождения"/>
        <input type="text" name="country" placeholder="Страна"/>
        <input type="email" name="email" placeholder="Почта"/>
        <input type="password" name="password" placeholder="Пароль"/>
        <input type="password" name="password_repeat" placeholder="Повторите пароль"/>
        <input type="submit" value="Продолжить" style="background-color: rgba(66, 142, 255, 1); color: white; border: none;"/>
    </form>
</div>

</body>
</html>