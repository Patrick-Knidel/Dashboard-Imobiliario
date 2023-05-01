<?php
include 'menu.php';
include "conexao/conexao.php";
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
            <h3 class="mb-0">Cadastro de Imovel</h3>
          </div>

          <div class="container" style="margin-top: 10px">
            <form action="/projetoDashboard/cadastros/inserir_imovel.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-2">
                  <?php
                  $codigo = rand(1, 99999);
                  ?>
                  <div class="form-group">
                    <label>Código Imóvel</label>
                    <input type="text" class="form-control form-control-alternative" name="imovel" value="<?php echo $codigo ?>" required readonly style="text-align: center;">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Valor do Imóvel</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o valor do imóvel" name="valorImovel" required="" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o seu email" name="email" required="" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>CPF do Proprietário</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o seu CPF" name="cpf" required="" autocomplete="off">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Endereço</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o endereço" name="endereco" required="" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Número</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o número" name="numero" required="" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Bairro</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o bairro" name="bairro" required="" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Complemento</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o complemento" name="complemento" required="" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Cidade</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Cidade" name="cidade" required="" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>UF</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="UF" name="estado" required="" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Cep</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o cep" name="cep" required="" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Alugal ou Venda</label>
                    <select name="aluguelVenda" id="aluguelVenda" class="form-control form-control-alternative">
                      <option>Selecione uma Opção</option>
                      <?php
                      $sql = "SELECT * FROM modalidade";
                      $result = mysqli_query($conexao, $sql);
                      while ($dados = mysqli_fetch_array($result)) {
                        $idModalidade = $dados['id_modalidade'];
                        $modalidade = $dados['tipo_modalidade'];
                      ?>
                        <option value="<?php echo $idModalidade ?>"> <?php echo $modalidade ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Modalidade de Pagamento</label>
                    <select name="modalidadePagamento" id="modalidadePagamento" class="form-control form-control-alternative">
                      <option>Selecione uma Opção</option>
                      <?php
                      $sql = "SELECT * FROM pagamento";
                      $result = mysqli_query($conexao, $sql);
                      while ($dados = mysqli_fetch_array($result)) {
                        $idPagamento = $dados['id_pagamento'];
                        $pagamento = $dados['tipo_pagamento'];
                      ?>
                        <option value="<?php echo $idPagamento ?>"> <?php echo $pagamento ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Categoria do Imóvel</label>
                    <select name="categoriaImovel" id="categoriaImovel" class="form-control form-control-alternative">
                      <option>Selecione uma Opção</option>
                      <?php
                      $sql = "SELECT * FROM categoria";
                      $result = mysqli_query($conexao, $sql);
                      while ($dados = mysqli_fetch_array($result)) {
                        $idCategoria = $dados['id_categoria'];
                        $categoria = $dados['nome_categoria'];
                      ?>
                        <option value="<?php echo $idCategoria ?>"> <?php echo $categoria ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Fotos</label>
                  <table class="table" id="products-table">
                    <thead>
                      <tr></tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php $i = 0; ?>
                        <td>
                          <input type="file" name="foto[<?php echo $i ?>]" class="form-control-file" id="exempleFormControlFile1">
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="5" style="text-align: right;">
                          <button onclick="addTableRow()" type="button" class="btn btn-secondary">
                            Adicionar mais uma foto
                          </button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
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
  <script language="javascript">
    var maximo = 6;
    (function($) {
      addTableRow = function() {
        var qtd = $("#products-table tbody tr").length;
        if (qtd < maximo) {
          var newRow = $("<tr>");
          var cols = "";

          cols += '<td>  <input type="file" name="foto[' + qtd + ']" class="form-control-file" id="exampleFormControlFile1"></td></tr>';


          newRow.append(cols);
          $("#products-table").append(newRow);
          resetId();
          return false;
        }
      };
    })(jQuery);
    //renova os ids dos campos dinâmicos
  </script>
</body>

</html>