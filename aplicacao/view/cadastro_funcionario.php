
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
                                 <h2 class="title"> Cadastro de Funcionário </h2>
                                 <hr>
                              </div>
                              <form role="form" class="row" id="formulario" name="formulario" method="POST">

                                 <div class="form-group col-6">
                                    <label class="control-label">Nome: </label>
                                    <input type="text" id="nome" name="nome" required="required" class="form-control boxed" autofocus>
                                 </div>

                                 <div class="form-group col-2">
                                    <label class="control-label">CPF: </label>
                                    <input type="text" id="cpf" name="cpf" required="required" class="form-control boxed" placeholder="">
                                    
                                 </div>

                                 <div class="form-group col-4">
                                    <label class="control-label">Telefone: </label>
                                    <input type="text" id="telefone" name="telefone" class="form-control boxed">
                                 </div>

                                 <div class="form-group col-4">
                                    <label class="control-label">E-mail: </label>
                                    <input type="email" pattern="[^ @]*@[^ @]*" id="email" name="email" class="form-control boxed">
                                 </div>

                                 <div class="form-group col-2">
                                    <label class="control-label">Sexo:</label>
                                    <select class="form-control boxed" id="sexo" name="sexo" >
                                      <option>Selecione</option>
                                      <option>Masculino</option>
                                      <option>Feminino</option>
                                    </select>
                                 </div>

                                 <div class="form-group col-6">
                                    <label class="control-label">Endereço: </label>
                                    <input type="text" id="endereco" name="endereco" class="form-control boxed">
                                 </div>

                                 <div class="form-group col-6">
                                    <label class="control-label">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control boxed">
                                 </div>

                                 <div class="form-group col-6">
                                   <label class="control-label">Cidade: </label>
                                   <input type="text" id="cidade" name="cidade"  class="form-control boxed">
                                </div>
                                 </fieldset>


                                  <!---
                                 <div class="form-group col-4">
                                    <label class="control-label">Foto:</label>
                                    <img class="image-container" src="https://index.tnwcdn.com/images/9794fd32b7b694d7720d2e655049051b78604f09.jpg" ></img>
                                 </div>
                                 --->
                               <div class="col-11" align="end">

                                <input type="reset" class="btn btn-success" value="Novo"/>

                                <input type="submit" id="salvar" name="salvar"  class="btn btn-primary" value="Salvar">

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
                                                                <th>NOME</th>
                                                                <th>CPF</th>
                                                                <th>TELEFONE</th>
                                                                <th>EMAIL</th>
                                                                <th>CIDADE</th>
                                                                <th>ACAO</th>
                                                              </tr>
                                                          </thead>

                                                          <tbody>
                                                          <td>1</td>
                                                                <td>Ana Maria</td>
                                                                <td>999.999.999-99</td>
                                                                <td>(62) 3307-2512</td>
                                                                <td>anamaria@email.com</td>
                                                                <td>Ceres</td>
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
