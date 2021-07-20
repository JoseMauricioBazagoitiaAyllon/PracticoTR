<?php include_once("BD_conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head runat="server">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/Estilo.css">
        <title>Sistemas de Control</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://unpkg.com/freezeframe/dist/freezeframe.min.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      

      function drawChart() {
        const logo = new Freezeframe('#logo', {
            trigger: false
        });
        const C = new Freezeframe('#C', {
            trigger: false
        });
        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Temperatura', 0],
        ]);

        var options = {
          width: 300, height: 300,
          redFrom: 35, redTo: 50,
          yellowFrom:25, yellowTo: 35,
          minorTicks: 5, max:50
        };

        var chart = new google.visualization.Gauge(document.getElementById('Medidores'));

        chart.draw(data, options);
        
        setInterval(function() {
            momentoActual = new Date();
            fecha = momentoActual.getDate();
            fecha1 = momentoActual.getMonth() + 1;
            fecha2 = momentoActual.getFullYear();
            minuto = momentoActual.getMinutes();
            hora = momentoActual.getHours();
            segundo = momentoActual.getSeconds();
            horaImprimible = hora + " : " + minuto + " : " + segundo;
            fechac = fecha + "/" +fecha1 + "/"+fecha2;//
            console.log(fechac);
            console.log(horaImprimible);
            i= 5 + Math.round(45 * Math.random());       
            data.setValue(0, 1, i);
            chart.draw(data, options);
            if (i >= 35) {
                alerta = 'Peligro';
                save(i);
                logo.start();
                C.stop();
                
                //save(fechac,horaImprimible,i,alerta);
            }else{
                alerta = 'normal';
                save();
                logo.stop();
                C.start();
                
                
            }
            console.log(alerta);
        }, 2000);
      }
      function save(i){
        <?php
                $sql = "INSERT INTO reg (fecha, hora, te, lec, alerta) VALUES (echo i,'5:55',2000, '52','Peligro')";
                //console.log($sql);
                if (mysqli_query($conn, $sql)) {
                      ?>console.log("entro");<?php
                } else {
                      ?>console.log("no entro");<?php
                }
                //mysqli_close($conn);    
            ?>
      }
    </script>

    </head>
    <body onload="mueveReloj()">
        <nav class="navbar navbar-light bg-warning">
            <h1 class="text-center a1">Sistema de Control de Temperatura</h1>
        </nav>
        <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:cargar('ControlPro.php')">Control Proceso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:cargar('Parametros.php')">Parametros a seguir</a>
                </li><!--
                <li class="nav-item">
                    <a class="nav-link" href="javascript:cargar('ControlTem.html')">Tareas y Procesos</a>
                </li>-->
                </ul>
            </div>
            </div>
        </nav>
        </div>
        <div class="container-fluid">
            <div id="Descripcion">
            <div class="row">
                
            
                <div class="col">
                    <h5>Sensor  de</h5>
                    <h5>Temperatura</h5>
                    <!--<img src="imagenes/termometro.gif" class="img-thumbnail" alt="..." width="163" height="150"> -->
                    <div id="Medidores">

                    </div>
                    <h5>Calentador</h5>
                    <img class="C" id="C" src="imagenes/foco.gif"  alt="..." width="200" height="250">
                </div>
                <div class="col">
                    <h5>Ventilador</h5>
                    <img class="logo" id="logo"  src="imagenes/ventilador.gif" class="img-thumbnail" alt="..." width="200" height="330">
                    
                </div>
                <div class="col">
                    <br><br>
                    <form name="form_reloj">
                        <input type="text" height="30" width="50" name="reloj" style="background-color : rgb(168, 31, 122); color : White; font-family : Verdana, Arial, Helvetica; font-size : 15pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()">                        
                    </form>
                    <label for="customRange1" class="form-label">Minimo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Maximo</label><br>
                    <input type="range" class="form-range" id="customRange1">
                    <br><br>
                </div>
            </div>
            </div>
        </div>




        <script language="JavaScript">
            function mueveReloj(){
                momentoActual = new Date()
                hora = momentoActual.getHours()
                minuto = momentoActual.getMinutes()
                segundo = momentoActual.getSeconds()
            
                horaImprimible = hora + " : " + minuto + " : " + segundo;
            
                document.form_reloj.reloj.value = horaImprimible
            
                setTimeout("mueveReloj()",1000)
            }
        </script>
        <script src="js/ajax.js"></script>
        <script src="js/jquery-3.5.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>