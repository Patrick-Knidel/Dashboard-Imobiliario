<?php
include '../menu2.php';

$nome = $_GET['nome'];
$sobrenome = $_GET['sobrenome'];
$email = $_GET['email'];
$cpf = $_GET['cpf'];
$endereco = $_GET['endereco'];
$complemento = $_GET['complemento'];
$numero = $_GET['numero'];
$bairro = $_GET['bairro'];
$cidade = $_GET['cidade'];
$estado = $_GET['estado'];
$cep = $_GET['cep'];
$interesse = $_GET['interesse'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<body>
  <div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header border-1">
            <h3 class="mb-0">Status Cliente Cadastrado com Sucesso</h3>
          </div>

          <div class="container" style="margin-top: 10px">
            <?php
              include '../conexao/conexao.php';

              $sql = "INSERT INTO `cliente`(`nome_cliente`, `sobrenome_cliente`, `endereco_cliente`, `nro_end_cliente`, `complemento_cliente`, `bairro_cliente`, `cidade_cliente`, `uf_cliente`, `cep_cliente`, `email_cliente`, `cpf_cliente`, `interesse_cliente`) VALUES ('$nome','$sobrenome','$endereco','$numero','$complemento','$bairro','$cidade','$estado','$cep','$email','$cpf','$interesse')";
              $result = mysqli_query($conexao,$sql);
              $teste = mysqli_affected_rows($conexao);

              if ($teste == 1) { ?>
                <center>
                  <div id='aprovado' style="width:200px; height: 200px"></div>
                  <h4>Aprovado</h4>
                  <a href="../formularioCliente.php" role="button" class="btn btn-primary">Voltar</a>
                </center>
              <?php
              }else { ?>
                <center>
                  <div id="erro" style="width:200px; height: 200px"></div>
                  <h4>Erro</h4>
                  <a href="../formularioCliente.php" role="button" class="btn btn-primary">Voltar</a>
                </center>
                <?php              
              }
              ?>
            
            <div class="card-footer py-4">
              <div style="text-align: right">

              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <!-- Footer -->
    <footer class="footer">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </div>


  <?php
  include '../rodape.php';
  ?>

  <script src="animacoes/bodymovin.js"></script>
  <script type="text/javascript">
    var svgContainer = document.getElementById('erro');
    var animItem = bodymovin.loadAnimation({
      wrapper: svgContainer,
      animType: 'svg',
      loop: true,
      autoplay: true,

      path: 'animacoes/error.json'
    });
  </script>


  <script type="text/javascript">
    var svgContainer = document.getElementById('aprovado');
    var animItem = bodymovin.loadAnimation({
      wrapper: svgContainer,
      animType: 'svg',
      loop: true,
      autoplay: true,

      path: 'animacoes/aprovado.json'
    });
  </script>

</body>

</html>