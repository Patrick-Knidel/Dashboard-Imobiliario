<?php
include 'menu.php';
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
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header border-1">
            <h1 class="text-center">Lista de Imóveis</h1>
          </div>
            
            <div class="table-responsive">
              <div>
                <table class="table align-items-center">
                  <thead class="">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Código</th>
                      <th scope="col" class="sort" data-sort="budget">Valor</th>
                      <th scope="col" class="sort" data-sort="status">Bairro</th>
                      <th scope="col" class="sort" data-sort="completion">Cep</th>
                      <th scope="col" class="sort" data-sort="completion">Ação</th>
                    </tr>
                  </thead>

                  <tbody class="list">
                    <tr>
                      <?php
                      include 'conexao/conexao.php';
                      $sql = 'SELECT * FROM imovel';
                      $result = mysqli_query($conexao, $sql);

                      while ($dados = mysqli_fetch_array($result)) {
                        $idImovel = $dados['id_imovel'];
                        $codigo = $dados['codigo_imovel'];
                        $valor = $dados['valor_imovel'];
                        $bairro = $dados['bairro_imovel'];
                        $cep = $dados['cep_imovel'];

                      ?>
                        <td><?php echo $codigo ?></td>
                        <td><?php echo $valor ?></td>
                        <td><?php echo $bairro ?></td>
                        <td><?php echo $cep ?></td>
                        <td><a href="editarStatus.php?id=<?php echo $idImovel ?>" role="button" class="btn btn-primary">Vender/Alugar</a> </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

            </div>


          
        </div>


      </div>
    </div>
  </div>
</body>

</html>