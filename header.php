
<header class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
        <div class="container">
            <a href="../" class="navbar-brand"><img src="images/main/logotev3.png" alt="Libros Tecnología Educativa"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <nav class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <?php
                 for ($t=0; $t < sizeof($mainMenu['texto']) ; $t++)
                  {
                    $i=$mainMenu['icon'][$t];
                    $u=$mainMenu['url'][$t];
                    $txt=$mainMenu['texto'][$t];
                   echo "<li class='nav-item'>";
                   echo " <a class='nav-link' href='".$u."'>";
                   echo "<i class='$i'></i> ".$txt." </a></li> ";
                }
                ?>

            </ul>
            <ul class="nav navbar-nav ml-auto">
                 <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download"><i class="fas fa-search"></i> Buscar<span class="caret"></span></a>
                <div class="dropdown-menu" >
                    <form class="form-inline my-12 my-lg-0">
                    <input class="form-control mr-sm-2 mx-sm-2" type="text" placeholder="Buscar">
                    <button class="btn btn-secondary my-2 my-sm-1 mx-sm-5" type="submit">Buscar</button>
                    </form>
                </div>
                <li class="nav-item">
                <a class="nav-link" href="#" target="_blank">Iniciar Sesión</a>
                </li>
            </ul>

            </nav>
        </div>
 </header>
 