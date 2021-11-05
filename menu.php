<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">EuAvalio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorias
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <?php include_once("carregar_menu.php")?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Algo mais aqui</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Contato</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a href="adm/login.php" class="btn btn-primary ">Adm</a>||
    </form>
	  <a href="cliente/login.php" class="btn btn-primary my-2 my-sm-0">Entrar</a>
	  
	  
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<?php include_once("autenticar_index.php")?>
</nav>