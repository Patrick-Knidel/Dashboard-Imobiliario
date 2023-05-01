<?php
include '../menu2.php';

$codigo = $_POST['imovel'];
$valorImovel = $_POST['valorImovel'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$aluguelVenda = $_POST['aluguelVenda'];
$modalidadePagamento = $_POST['modalidadePagamento'];
$categoriaImovel = $_POST['categoriaImovel'];
$foto = $_FILES['foto'];
$status = 'ativo';
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
            <h3 class="mb-0">Status Imóvel Cadastrado com Sucesso</h3>
          </div>

          <div class="container" style="margin-top: 10px">
            <?php              
              include "../conexao/conexao.php";
              $sql = "INSERT INTO `imovel`(`codigo_imovel`, `end_imovel`, `nro_end_imovel`, `bairro_imovel`, `cidade_imovel`, `uf_imovel`, `cep_imovel`, `complemento_imovel`, `valor_imovel`, `id_modalidade_imovel`, `id_pagamento_imovel`, `id_categoria_imovel`, `cpf_cliente_imovel`,`status_imovel`) VALUES ('$codigo','$endereco','$numero','$bairro','$cidade','$estado','$cep','$complemento','$valorImovel','$aluguelVenda','$modalidadePagamento','$categoriaImovel','$cpf','$status')";
              $result = mysqli_query($conexao,$sql);
              $teste = mysqli_affected_rows($conexao);

              mkdir('../uploads/'. $codigo . '');

              if ($teste == 1) { ?>
                <center>
                  <div id='aprovado' style="width:200px; height: 200px"></div>
                  <h4>Aprovado</h4>
                  <a href="../formularioImovel.php" role="button" class="btn btn-primary">Voltar</a>
                </center>
              <?php
              }else { ?>
                <center>
                  <div id="erro" style="width:200px; height: 200px"></div>
                  <h4>Erro</h4>
                  <a href="../formularioImovel.php" role="button" class="btn btn-primary">Voltar</a>
                </center>
                <?php              
              }

              foreach($_FILES['foto']['name'] as $key => $name){
                $_FILES['foto']['type'][$key];
                $_FILES['foto']['tmp_name'][$key];
                include "../conexao/conexao.php";
                preg_match("/\.(png|jpg|jpeg){1}$/i", $_FILES['foto']['name'][$key], $ext);

                $caminho_foto2 = '../uploads/' . $codigo . '/';

                if($ext == true){
                  $nome_foto = md5(uniqid(time())) . "." . $ext[1];
                  $caminho_foto = $caminho_foto2 . $nome_foto;
                  move_uploaded_file($_FILES['foto']['tmp_name'][$key], $caminho_foto);
                  
                  $sql2 = "INSERT INTO foto (`nome_foto`,`id_foto_imovel`) VALUES ('$nome_foto','$codigo')";
                  $result2 = mysqli_query($conexao,$sql2);
                }              
              };

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