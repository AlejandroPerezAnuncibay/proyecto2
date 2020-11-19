 <nav id="menu">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn open">
        <i class="fas fa-bars"></i>
    </label>
    <label for="check" class="checkbtn close">
        <i id="cerrar" class="fas fa-times"></i>
    </label>

    <ul id="menuList">
        <li id="btnCal"><a class="active" href="http://localhost:8765/proyecto2/php/home.php">Inicio</a></li>
        <li id="btnUsu"><a href="http://localhost:8765/proyecto2/php/user.php">Mi perfil</a></li>
        <li><a href="#">Preguntas</a></li>
        <li><a href="#">Sin responder</a></li>
        <li class="salir"><a href="http://localhost:8765/proyecto2/php">Cerrar sesion</a></li>
    </ul>

    <form class="buscador" action="#">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <i class='fas fa-user-circle' style='font-size:36px'><a href="http://localhost:8765/proyecto2/php"></a></i>
    <i class="fa fa-sign-out" style="font-size:36px"><a href="#"></a></i>
    <div class="btncambiar">
        <input type="button" value="Log in" class="btnSignin unactive changeForm">
        <input type="button" value="Sign up" class="btnSignup active">
    </div>

</nav>