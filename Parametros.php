<?php include_once("BD_conexion.php");
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No. Cod</th>
      <th scope="col">Nombre de Sensor</th>
      <th scope="col">Temperatura Minima</th>
      <th scope="col">Temperatura Maxima</th>
      <th scope="col">Temperatura Adecuada</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $sql_query = "SELECT id, NombreDeSensor, TempMax, TempMin, TempA FROM parametros";
      $resultset = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
      while( $parm = mysqli_fetch_assoc($resultset) ) { ?>
      <tr >
        <td><?php echo $parm ['id']; ?></td>
        <td><?php echo $parm ['NombreDeSensor']; ?></td>
        <td><?php echo $parm ['TempMax']; ?></td>
        <td><?php echo $parm ['TempMin']; ?></td>   
        <td><?php echo $parm ['TempA']; ?></td>  
        </tr>
    <?php } ?>
  </tbody>
</table>