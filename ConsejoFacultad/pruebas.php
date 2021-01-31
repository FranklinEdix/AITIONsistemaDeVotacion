<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graficos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
    
</head>

<body>
    <canvas id="myChart" width="40" height="40"></canvas>
    <?php 
        $var = array(1,2,3,4,5,6);
        $nombre = array('si mano', 'si mano', 'si mano', 'si mano', 'si mano', 'si mano');
    ?>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var data = [<?php echo implode(",",$var); ?>];
        var nombre = [<?php echo implode(",",$nombre); ?>];
        var myChart = new Chart(ctx, {
            
            type: 'bar',
            data: {
                labels: nombre,
                datasets: [{
                    label: '# of Votes',
                    data: data,
                    backgroundColor: 
                        'rgba(51, 156, 255, 0.7)'
                    ,
                    borderColor: 
                        'rgba(51, 156, 255, 0.7)'
                    ,
                    borderWidth: 5
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
    </script>
</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>