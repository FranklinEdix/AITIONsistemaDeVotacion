<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css"  />
    <title>Gráfico</title>
  </head>
  <body>
    <div class="col-lg-6" style="padding-top:20px ;">
            <div class="card">
                <div class="card-header">
                    Gráfico
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <button class="btn btn-primary" onclick="CargarDatosGraficoBar('myChart','bar','Listas')">Grafico Barra</button>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary" onclick="CargarDatosGraficoBar('myChart2','horizontalBar','Listas')">Grafico Barra Horizontal</button>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary" onclick="CargarDatosGraficoBar('myChart3','doughnut','Listas')">Grafico Dona</button>
                        </div>
                        <div class="col-lg-5">
                            <button class="btn btn-primary" onclick="CargarDatosGraficoBar('myChart4','polarArea','Listas')">Grafico Polar Area</button>
                        </div>
                        <canvas id="myChart" width="400" height="400"></canvas>
                        <canvas id="myChart2" width="400" height="400"></canvas>
                        <canvas id="myChart3" width="400" height="400"></canvas>
                        <canvas id="myChart4" width="400" height="400"></canvas>
                    </div>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
    </div>
    
  </body>
</html>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" ></script>
    
    <script>

        function CargarDatosGraficoBar(id,tipo,encabezado)
        {
            var titulo=[];
            var cantidad=[]; 
            $.ajax({
            url:'controlador_grafico.php',
            type:'POST'
            }).done(function(resp){
                if(resp.length>0)
                {
                var info=JSON.parse(resp);
                for(var i= 0;i<info.length;i++)
                {
                    titulo.push(info[i][0]);
                    cantidad.push(info[i][4]);
                }
                //llamar función
                if(id=="myChart3"||id=="myChart4")
                {
                    crear_dona_grafico(id,tipo,encabezado,titulo,cantidad);
                }
                else
                {
                    crear_grafico(id,tipo,encabezado,titulo,cantidad);
                }

                //
                }
            }); 
            
        }
        function crear_grafico(id,tipo,encabezado,titulo,cantidad)
        {
            var ctx = document.getElementById(id);
            var myChart = new Chart(ctx, {
            type: tipo,
            data: {
                labels: titulo,
                datasets: [{
                    label: encabezado,
                    data: cantidad,
                    backgroundColor: color(cantidad.length,1),
                    borderColor: color(cantidad.length,1),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        }

      function crear_dona_grafico(id,tipo,encabezado,titulo,cantidad)
        {
            var data = {
                        labels: titulo,
                        datasets: [
                            {
                                data: cantidad,
                                backgroundColor: color(cantidad.length,1),
                                
                            }]
                    };
 
            var ctx = document.getElementById(id);
            var myChart = new Chart(ctx, {
            type: tipo,
            data: data,
           
            options: {   
                
            }
        });
        }
        //-------------------------------------------------------------------------------------
        function color(cant,difusion)
        {
            var exa=[];
            var R=3;
            var G=0;
            var B=1;
            var auxR=Math.trunc(236/cant);
            var auxB=Math.trunc(49/cant);
            for(var i=0;i<cant;i++)
            {   exa.push('rgba('+R+','+G+','+B+','+difusion+')');
                var R=R+auxR;
                var B=B+auxB;
                
            }
            return exa;
        }

    </script>
  
    