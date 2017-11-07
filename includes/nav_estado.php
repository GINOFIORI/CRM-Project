<nav id="nav-estado" class="navbar">
  <span class="navbar-brand mb-0 h1">
    <a href="#" style="padding: 0px; text-align: right;">
      <?php 
      if(array_key_exists('logged', $_SESSION)){
        echo "<i class='fa fa-user-circle-o'></i> Usuario: ".$_SESSION['nombre'] ." ". $_SESSION['apellido'];
      }
      ?>
    </a>
  </span>
</nav>