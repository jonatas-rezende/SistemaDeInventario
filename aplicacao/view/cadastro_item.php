
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
                                 <h2 class="title"> Cadastro de Item </h2>
                                 <hr>
                              </div>
                              <form role="form" class="row" id="formulario" name="formulario" method="POST">

                                 <div class="form-group col-3">
                                    <label class="control-label">Matrícula: </label>
                                    <input type="text" id="matricula" name="matricula" required="required" class="form-control boxed" autofocus>
                                 </div>

                                 <div class="form-group col-6">
                                    <label class="control-label">Modelo: </label>
                                    <input type="text" id="modelo" name="modelo" required="required" class="form-control boxed" placeholder="">

                                 </div>
                                 <div class="form-group col-3">
                                    <label class="control-label">Quantidade: </label>
                                    <input type="text" id="quantidade" name="quantidade" class="form-control boxed">
                                 </div>
                                 <div class="form-group col-4">
                                    <label class="control-label">Localização: </label>
                                    <input type="text" id="localização" name="localização" class="form-control boxed">
                                 </div>
                                 <div class="form-group col-2">
                                    <label class="control-label">Data Aquisição: </label>
                                    <input type="date" id="dataAquisicao" name="dataAquisicao" class="form-control boxed">
                                 </div>
                                 <div class="form-group col-3">
                                    <label class="control-label">Vida útil: </label>
                                    <input type="text" id="vidaUtil" name="vidaUtil" class="form-control boxed">
                                 </div>

                                 <div class="form-group col-3">
                                    <label class="control-label">Situação:</label>
                                    <select class="form-control boxed" id="sexo" name="sexo" >
                                      <option>Situação</option>
                                      <option>Disponível</option>
                                      <option>Emprestado</option>
                                    </select>
                                 </div>

                                 <div class="form-group col-3">
                                    <label class="control-label">Valor de Aquisição (R$): </label>
                                    <input type="text" id="valorAquisicao" name="valorAquisicao" class="form-control boxed">
                                 </div>
                                 <div class="form-group col-9">
                                    <label class="control-label">Descrição: </label>
                                    <input type="text" id="descricao" name="descricao" class="form-control boxed">
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
                                 </div>

                              <div class="col-md-12">
                                      <div class="card">
                                          <div class="card-block">
                                              <div class="card-title-block">
                                                  <h3 class="title"> Clientes cadastrados</h3>
                                              </div>

                                              <section class="example">
                                                  <div class="table-responsive" style="display: block;
                                                  max-height: 400px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
                                                      <table class="table table-striped table-bordered table-hover table-overflow">
                                                          <thead>
                                                              <tr>
                                                                <th>#</th>
                                                                <th>Matricula</th>
                                                                <th>Modelo</th>
                                                                <th>Quantidade</th>
                                                                <th>Localização</th>
                                                                <th>Status</th>
                                                                <th>Valor de Aquisição</th>
                                                                <th>Descrição</th>
                                                                <th>Ação</th>
                                                              </tr>
                                                          </thead>

                                                          <tbody>
                                                          <td>1</td>
                                                                <td>A 1</td>
                                                                <td>Notebook Acer Aspire 3 A315-53-32U4</td>
                                                                <td>1</td>
                                                                <td>Armario 1</td>
                                                                <td>Emprestado</td>
                                                                <td>R$ 1859</td>
                                                                <td>Completo</td>
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
