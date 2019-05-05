
<!doctype html>
<html class="no-js" lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title> Sistema de Invetário </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" href="apple-touch-icon.png">
      <link rel="stylesheet" href="../assets/css/vendor.css">
      <link rel="stylesheet" id="theme-style" href="../assets/css/app-green.css">
      <link rel="stylesheet" id="theme-style" href="../assets/css/app.css">

   </head>
   <body>
       <div class="main-wrapper">
           <div class="app" id="app">
               <?php include 'header.php';?>

               <aside class="sidebar">
                   <div class="sidebar-container">
                       <div class="sidebar-header">
                           <div class="brand">
                               <div class="logo">
                                   <span class="l l1"></span>
                                   <span class="l l2"></span>
                                   <span class="l l3"></span>
                                   <span class="l l4"></span>
                                   <span class="l l5"></span>
                               </div> Inventário
                           </div>
                       </div>

                       <?php include 'menu_lateral.php'; ?>
                   </div>

               </aside>
               <div class="sidebar-overlay" id="sidebar-overlay"></div>
               <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
               <div class="mobile-menu-handle"></div>
               <article class="content forms-page">
                  <section class="section">

                     <div class="row">

                        <div class="col-md-12">
                           <div class="row card card-block sameheight-item">
                              <div class="title-block">
                                 <h2 class="title"> Realizar Empréstimo </h2>

                                 <hr>
                              </div>
                              <form role="form" class="row" id="formulario" name="formulario" method="POST">

                                <div class="form-group col-6">
                                   <label class="control-label">Funcionário:</label>
                                   <select class="form-control boxed" id="funcionarios" name="funcioanrios" autofocus>
                                     <option>Selecione</option>
                                     <option>Ana</option>
                                     <option>Pedro</option>
                                   </select>
                                </div>

                                <div class="form-group col-6">
                                   <label class="control-label">Requerente: </label>
                                   <input type="text" id="requerente" name="requerente" class="form-control boxed" required>
                                </div>

                                <div class="form-group col-3">
                                   <label class="control-label">Itens:</label>
                                   <select class="form-control boxed" id="itens" name="itens" required >
                                     <option>Selecione</option>
                                     <option>Computador</option>
                                     <option>Mouse</option>
                                   </select>
                                </div>

                                <div class="form-group col-3">
                                   <label class="control-label">Quantidade: </label>
                                   <input type="number" id="quantidade" name="quantidade" class="form-control boxed" required>
                                </div>

                                 <div class="form-group col-3">
                                    <label class="control-label">Data de Empréstimo: </label>
                                    <input type="date" id="data" name="data" required="required" class="form-control boxed">
                                 </div>

                                 <div class="form-group col-3">
                                    <label class="control-label">Data de Devolução: </label>
                                    <input type="date" id="datadevolucao" name="dataDevolucao" required="required" class="form-control boxed" placeholder="">

                                 </div>
                                 <div class="form-group col-12">
                                    <label class="control-label">Observação: </label>
                                    <input type="text" id="quantidade" name="quantidade" class="form-control boxed" required>
                                 </div>
                                 </fieldset>


                                  <!---
                                 <div class="form-group col-4">
                                    <label class="control-label">Foto:</label>
                                    <img class="image-container" src="https://index.tnwcdn.com/images/9794fd32b7b694d7720d2e655049051b78604f09.jpg" ></img>
                                 </div>
                                 --->
                               <div class="col-11" align="end">
                                 <input type="submit" id="salvar" name="salvar"  class="btn btn-primary" value="Salvar">
                                 <input type="reset" class="btn btn-success" value="Novo"/>

                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                  Imprimir
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Itens do Empréstimo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p align="justify">Declaro utilizar com cuidado e zelo o equipamento solicitado.
                                          Estou ciente sobre os processos constantes no Regimento Interno.
                                          Afirmo ter verificado, antes da retirada, que o equipamento se encontrava
                                          em perfeitas condições de uso no qual estado será entrege. <br><br>

                                          ---- listar os itens da tabela ---<br><br>



                                          Assinatura: ______________________________________
                                        </p>

                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Imprimir</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                               <!--fim do modal -->


                              </div>
                              <div class="col-md-12">
                                      <div class="card">
                                          <div class="card-block">
                                              <div class="card-title-block">

                                                  <h3 class="title"> Empréstimos do requerente</h3>
                                              </div>

                                              <section class="example">
                                                  <div class="table-responsive" style="display: block;
                                                  max-height: 400px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
                                                      <table class="table table-striped table-bordered table-hover table-overflow">
                                                          <thead>
                                                              <tr>
                                                                <th>#</th>
                                                                <th>Funcionário</th>
                                                                <th>Requerente</th>
                                                                <th>Item</th>
                                                                <th>Quantidade</th>
                                                                <th>Devolução</th>
                                                                <th>Observação</th>
                                                                <th>Ação</th>
                                                              </tr>
                                                          </thead>

                                                          <tbody>
                                                          <td>1</td>
                                                                <td>Bob</td>
                                                                <td>Pedro</td>
                                                                <td>Mouse</td>
                                                                <td>10</td>
                                                                <td>10/10/2010</td>
                                                                <td>Perfeito funcionamento</td>
                                                                <td><button type="button" class="btn btn-success">Editar</button>
                                                                    <button type="button" class="btn btn-danger">Excluir</button>
                                                                </td>
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </section>
                                          </div>
                                      </div>
                                  </div>
                              </form>

                           </div>
                        </div>
                     </div>
                  </section>
               </article>
             </div>
             </div>
             <?php include 'footer.php'; ?>
               <!-- Reference block for JS -->
               <div class="ref" id="ref">
                   <div class="color-primary"></div>
                   <div class="chart">
                       <div class="color-primary"></div>
                       <div class="color-secondary"></div>
                   </div>
               </div>
               <script src="../assets/js/vendor.js"></script>
               <script src="../assets/js/app.js"></script>
             </body>
</html>
