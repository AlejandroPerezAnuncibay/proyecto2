<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" type="image/png" href="../media/shortlogo.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/login.js"></script>

</head>

<body>
    <div id="color">
        <img src="../media/shortlogo.svg" alt="Logo" id="imgPcs">
        <h2 id="nombreEmpresa">Aergibide</h2>
    </div>
    <div id="login">
        <div class="btncambiar">
            <input type="button" value="Log in" class="btnSignin active">
            <input type="button" value="Sign up" class="btnSignup unactive changeForm">
        </div>
        <img src="../media/logologin.png" alt="Logo" class="imgMovil">
        <form action="./code.php" method="post" clas>
            <h1>Log in</h1>
            <i class="fa fa-user-circle">&nbsp;
                <input type="text" name="username" class="username" placeholder="Username"></i>
            <i class="fa fa-lock">&nbsp;
                <input type="password" name="password" class="password" placeholder="Password"></i>
            <div id="errorLog">
                <?php
                // Si el usuario ha intentado acertar un número mostramos el mensaje
                if (isset($_COOKIE["errorLog"])) {
                ?>
                    <p> <?= $_COOKIE["errorLog"] ?> </p>

                <?php   setcookie("errorLog", null, -1);} ?>
            </div>

            <input type="submit" value="Log in" onclick="return validateForm('login')">
            <input type="button" value="Sign up" class="btnSignmbl changeForm">
        </form>
        <p class="newaccount">Dont have an account? <a href=""> Enter as a guest</a></p>
    </div>
    <div id="signup">
        <div class="btncambiar">
            <input type="button" value="Log in" class="btnSignin unactive changeForm">
            <input type="button" value="Sign up" class="btnSignup active">
        </div>
        <img src="../media/logologin.png" alt="Logo" class="imgMovil">
        <form action="./code.php" method="post">
            <h1>Sign up</h1>
            <i class="fa fa-user-circle">&nbsp;
                <input type="text" required name="user" class="username" placeholder="Username"></i>
            <i class="fa fa-lock">&nbsp;
                <input type="password" required name="pass" class="password" placeholder="Password"></i>
                <i class="fa fa-lock">&nbsp;
                <input type="password" required name="pass" id="password2" placeholder="Repeat the password"></i>
            <i class='far fa-address-card'>&nbsp;
                <input type="text" name="nombre" id="nombre" required placeholder="Nombre"></i>
            <i class='fas fa-address-card'>&nbsp;
                <input type="text" name="apellido" id="apellido" required placeholder="Apellido"></i>
            <i class="fa fa-at">&nbsp;
                <input type="email" name="email" id="email" required placeholder="Correo electronico"></i>
            <!-- <i class="fa fa-file-image-o" id="fotoperfil">&nbsp;
                <input type="file" name="fotoperfil" class="fotoperfil" value="foto de perfil"></i> -->
            <input type="submit" value="Sign up" onclick="return validateForm('signup')">
            <input type="button" value="Log in" class="btnSignmbl changeForm">
        </form>
        <p class="newaccount">Dont have an account? <a href=""> Enter as a guest</a></p>
    </div>
</body>

</html>