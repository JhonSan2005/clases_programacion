<?php
  require_once __DIR__ . '/../../helpers/functions.php';

  $session_activa = isAuth();
?>

<nav class="navbar navbar-expand-lg text-bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand logo" href="/">
        <img src="/img/logol.png" alt="Logo Tienda">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link link-light fw-medium" aria-current="page" href="/">Inicio</a>
        </li>

        <?php if( !$session_activa ): ?>

        <li class="nav-item">
          <a class="nav-link link-light fw-medium" href="/login">Iniciar Sesion</a>
        </li>

        <li class="nav-item">
          <a class="nav-link link-light fw-medium" href="/register">Registrarse</a>
        </li>

        <?php else: ?>

          <li class="nav-item">
            <a class="nav-link link-light fw-medium" href="/products">Productos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link link-light fw-medium" href="/categories">Categorias</a>
          </li>

          <li class="nav-item dropdown">
          <a class="nav-link link-light fw-medium dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/admin/dashboard">Dashboard</a></li>
            <li><a class="dropdown-item" href="/profile">Perfil</a></li>
            <li><a class="dropdown-item" href="/shopping-cart">Carrito de Compras</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/close-session">Cerrar Sesion</a></li>
          </ul>
        </li>
        <?php endif; ?>

      </ul>



      <form class="d-flex" role="search" action="/search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="q">
        <button class="btn btn-primary" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>