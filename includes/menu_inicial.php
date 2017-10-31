<div id="mySidenav" class="sidenav" >
  <?php foreach ($menu as $titulo => $valor) { ?>
  <a href="<?php echo $valor[0] ?>">
    <i class="<?php echo $valor[1] ?>"></i>
    <?php echo $titulo; ?>
  </a>
  <?php 
  }
  if(array_key_exists('logged', $_SESSION)){ ?>
      <a href="includes/cerrar_sesion.php">Cerrar Session</a>
  <?php ;} ?>
</div>