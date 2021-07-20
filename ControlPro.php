<?php include_once("BD_conexion.php");
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Tiempo ejecucion</th>
      <th scope="col">Lectura</th>
      <th scope="col">Alerta</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      $sql_query = "SELECT id, fecha, hora, te,  lec, alerta FROM reg";
      $resultset = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
      while( $parm = mysqli_fetch_assoc($resultset) ) { ?>
      <tr >
        <td><?php echo $parm ['id']; ?></td>
        <td><?php echo $parm ['fecha']; ?></td>
        <td><?php echo $parm ['hora']; ?></td>
        <td><?php echo $parm ['te']; ?></td>   
        <td><?php echo $parm ['lec']; ?></td>  
        <td><?php echo $parm ['alerta']; ?></td>  
        </tr>
      <?php } ?>
  </tbody>
</table>