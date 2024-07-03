<?php
// Verificar si el usuario ha iniciado sesión
$session = session();
$isLoggedIn = $session->has('nombre');
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="../public/unsl.jpg" alt="unsl" width="35" height="44">
    </a>
  </div>
</nav>
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('') ?>">UNSL NOTICIAS</a>
    
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('') ?>">INICIO</a>
        </li>
        <?php if (!$isLoggedIn) : ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url('login') ?>">INICIAR SESIÓN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('signup') ?>">REGISTRARME</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
          <form action="<?= base_url('logout/logout') ?>" method="post">
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
          </li>
        <?php endif; ?>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
