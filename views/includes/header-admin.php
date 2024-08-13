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

        <?php if( $session_activa ): ?>

          <li class="nav-item">
            <a class="nav-link link-light fw-medium" href="/admin/dashboard">Dashboard</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link link-light fw-medium" href="/admin/tablaUser">Tabla</a>
          </li>

          <li class="nav-item">
            <a class="nav-link link-light fw-medium" href="/admin/products">Productos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link link-light fw-medium" href="/admin/categories">Categorias</a>
          </li>

          <li class="nav-item dropdown">
          <a class="nav-link link-light fw-medium dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/">Vista Usuarios</a></li>
            <li><a class="dropdown-item" href="/admin/profile">Perfil</a></li>
      
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/close-session">Cerrar Sesion</a></li>
          </ul>
        </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>