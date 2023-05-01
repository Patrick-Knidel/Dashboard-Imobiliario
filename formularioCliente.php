<?php
include 'menu.php';

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
            <h3 class="mb-0">Cadastro de Cliente</h3>
          </div>

          <div class="container" style="margin-top: 10px">
            <form action="/projetoDashboard/cadastros/inserir_cliente.php" method="get">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Nome" name="nome" required="" autofocus="" autocomplete="off">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Sobrenome</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="sobrenome" name="sobrenome" required="" autofocus="" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control form-control-alternative" placeholder="Email" name="email" required="" autofocus="" autocomplete="off">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>CPF</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o CPF" name="cpf" required="" autofocus="" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Endereço</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o endereço" name="endereco" required="" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Número</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o número" name="numero" required="" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Bairro</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Informe o bairro" name="bairro" required="" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
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
                    <label>Interesse</label>
                    <select name="interesse" id="interesse" class="form-control form-control-alternative">
                      <option>Comprar</option>
                      <option>Alugar</option>
                      <option>Comprar e Alugar</option>
                      <option>Vender</option>

                    </select>
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