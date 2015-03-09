<?

// Инициализируем переменные для введенных значений и возможных ошибок

$errors = array();

$fields = array();

?>

<html>

<head>

    <title>Регистрация пользователей</title>

    <link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <form action="" method="post">

        <div class="row">

            <label for="login">Укажите ваш логин:</label>

            <input type="text" class="text" name="login" id="login" value="<?=$fields['login'];?>" />

            <div class="error" id="login-error"><?=$errors['login'];?></div>

            <div class="instruction" id="login-instruction">В имени пользователя могут быть только символы латинского алфавита, цифры, символы '_', '-', '.'. Длина имени пользователя должна быть не короче 4 символов и не длиннее 16 символов</div>

        </div>

        <div class="row">

            <label for="password">Напишите ваш пароль:</label>

            <input type="password" class="text" name="password" id="password" value="" />

            <div class="error" id="password-error"><?=$errors['password'];?></div>

            <div class="instruction" id="password-instruction">В пароле вы можете использовать только символы латинского алфавита, цифры, символы '_', '!', '(', ')'. Пароль должен быть не короче 6 символов и не длиннее 16 символов</div>

        </div>

        <div class="row">

            <label for="password_again">Повторите введенный пароль:</label>

            <input type="password" class="text" name="password_again" id="password_again" value="" />

            <div class="error" id="password_again-error"><?=$errors['password_again'];?></div>

            <div class="instruction" id="password_again-instruction">Повторите введенный ранее пароль</div>

        </div>

        <div class="row">

            <!-- Кнопка отправки данных формы -->

            <input type="submit" name="submit" id="btn-submit" value="Зарегистрироваться" />

             

            <!-- Кнопка сброса полей формы к исходному состоянию -->

            <input type="reset" name="reset" id="btn-reset" value="Очистить" />

        </div>

    </form>

</body>

</html>
