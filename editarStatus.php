<?php
include 'menu.php';
include 'conexao/conexao.php';
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>

<body>

  <div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header border-1">
            <h3 class="mb-0">Status do Imóvel</h3>
          </div>

          <div class="container" style="margin-top: 10px">
            <form action="/projetoDashboard/cadastros/inserir_status.php" method="post">
              <div class="row">
                <div class="col-md-6">

                  <?php
                    $sql = "SELECT * FROM imovel WHERE id_imovel='$id'";
                    $result = mysqli_query($conexao,$sql);
                    while($dados = mysqli_fetch_array($result)){
                      $idImovel = $dados['id_imovel'];
                      $codigo = $dados['codigo_imovel'];
                    }
                  ?>
                  <div class="form-group">
                    <label>Código</label>
                    <input type="text" class="form-control form-control-alternative" value="<?php echo $codigo ?>" name="codigo" readonly>
                  </div>
                </div>

                <div class="col-md-6">
									<div class="form-group">
										<label for="exampleFormControlSelect1">Corretor de Imóveis</label>
										<select name="corretor" id="" class="form-control form-control-alternative">
                      <option>Selecione uma Opção</option>
                      <?php
                      $sql = "SELECT * FROM usuario";
                      $result = mysqli_query($conexao, $sql);
                      while ($dados = mysqli_fetch_array($result)) {
                        $idUsuario = $dados['id_usuario'];
                        $nome = $dados['nome_usuario'];
                        $usuario = $dados['usuario'];
                      ?>
                        <option value="<?php echo $usuario ?>"><?php echo $nome?> - <?php echo $usuario ?></option>
                      <?php } ?>
                    </select>
									</div>
								</div>          
                
              </div>

              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Modalidade</label>
                      <select name="aluguelVenda" id="" class="form-control form-control-alternative">
                        <option>Selecione uma Opção</option>
                        <?php
                        $sql = "SELECT * FROM modalidade";
                        $result = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_array($result)) {
                          $idModalidade = $dados['id_modalidade'];
                          $modalidade = $dados['tipo_modalidade'];
                        ?>
                          <option><?php echo $modalidade ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div><div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Valor</label>
                      <input type="text" name="valor" class="form-control form-control-alternative" autocomplete="off" required>

                    </div>
                  </div>
                </div>

              <div class="card-footer py-4">
                <div style="text-align: right">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
              </div>
            </form>
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
  include 'rodape.php';
  ?>

</body>

</html>