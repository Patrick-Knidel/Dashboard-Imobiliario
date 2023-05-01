<?php
include './conexao/conexao.php';

$sql = "SELECT SUM(valor_negocio) as valor_negocio, data_atual FROM status_imovel WHERE status_imovel = 'Venda' group by data_atual";
$buscar = mysqli_query($conexao,$sql);

$datas = '';
$valores = '';

while ($dados = mysqli_fetch_array($buscar)) {

  $dataFormatada = $dados['data_atual'];
  $dataFinal = explode('-',$dataFormatada);
  $dataArray = $dataFinal[2] . '/' . $dataFinal[1] . '/'. $dataFinal[0];
				
  $datas = '"' . $dataArray . '",'. '"' . $dataArray . '",';
	$valores = $valores . '"' . $dados['valor_negocio'] . '",';

	$datas = trim($datas);
	$valores = trim($valores);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
</head>
<body>

<canvas id="Linha"></canvas>

<script type="text/javascript">
	var ctx = document.getElementById('Linha').getContext('2d');
	var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
    		labels:[<?php echo $datas; ?>],
    		datasets:
    		[{
    			label:'Data',
    			data:[<?php echo $datas; ?>],    			
    			borderColor: 'rgba(255,255,255,1)',
    			borderWidth: 3,
    		},{
          label:'Valores',
    			data:[<?php echo $valores; ?>],    			
    			borderColor: 'rgba(255,255,255,1)',
    			borderWidth: 3,
        }
        ]

    },
    options: { 
    	legend: {
        display: false,
        labels: {
          fontColor: "black",
          fontSize: 18
        }
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: false,
            labelString: 'Datas',
            fontColor: '#ffffff',
            fontSize: 12
          },
          gridLines: {
          display: false,
          },
          ticks: {
            fontColor: "white",
            fontSize: 12
          },
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: false,
            labelString: 'Valores',
            fontColor: '#ffffff',
            fontSize: 12
          },
          gridLines: {
          display: false,
          },
          ticks: {
            min: 0,
            fontColor: "white",
            fontSize: 12
          }, 
        }]
        
      }
    }

});

</script>
</body>
</html>