
<!doctype html>
<html class="no-js" lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title> Sistema de Invetário </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" href="apple-touch-icon.png">
      <link rel="stylesheet" href="../css/vendor.css">
      <!-- Theme initialization -->
      <script>
          var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
          {};
          var themeName = themeSettings.themeName || '';
          if (themeName)
          {
              document.write('<link rel="stylesheet" id="theme-style" href="../css/app-' + themeName + '.css">');
          }
          else
          {
              document.write('<link rel="stylesheet" id="theme-style" href="../css/app.css">');
          }
      </script>
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
                               </div> Sistema de Invetário
                           </div>
                       </div>

                       <?php include 'menu_lateral.php'; ?>
                   </div>
                   <footer class="sidebar-footer">
                       <ul class="sidebar-menu metismenu" id="customize-menu">
                           <li>
                               <ul>
                                   <li class="customize">
                                       <div class="customize-item">
                                           <div class="row customize-header">
                                               <div class="col-4">
                                               </div>
                                               <div class="col-4">
                                                   <label class="title">fixed</label>
                                               </div>
                                               <div class="col-4">
                                                   <label class="title">static</label>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-4">
                                                   <label class="title">Sidebar:</label>
                                               </div>
                                               <div class="col-4">
                                                   <label>
                                                       <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                                       <span></span>
                                                   </label>
                                               </div>
                                               <div class="col-4">
                                                   <label>
                                                       <input class="radio" type="radio" name="sidebarPosition" value="">
                                                       <span></span>
                                                   </label>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-4">
                                                   <label class="title">Header:</label>
                                               </div>
                                               <div class="col-4">
                                                   <label>
                                                       <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                                       <span></span>
                                                   </label>
                                               </div>
                                               <div class="col-4">
                                                   <label>
                                                       <input class="radio" type="radio" name="headerPosition" value="">
                                                       <span></span>
                                                   </label>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-4">
                                                   <label class="title">Footer:</label>
                                               </div>
                                               <div class="col-4">
                                                   <label>
                                                       <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                                       <span></span>
                                                   </label>
                                               </div>
                                               <div class="col-4">
                                                   <label>
                                                       <input class="radio" type="radio" name="footerPosition" value="">
                                                       <span></span>
                                                   </label>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="customize-item">
                                           <ul class="customize-colors">
                                               <li>
                                                   <span class="color-item color-red" data-theme="red"></span>
                                               </li>
                                               <li>
                                                   <span class="color-item color-orange" data-theme="orange"></span>
                                               </li>
                                               <li>
                                                   <span class="color-item color-green active" data-theme=""></span>
                                               </li>
                                               <li>
                                                   <span class="color-item color-seagreen" data-theme="seagreen"></span>
                                               </li>
                                               <li>
                                                   <span class="color-item color-blue" data-theme="blue"></span>
                                               </li>
                                               <li>
                                                   <span class="color-item color-purple" data-theme="purple"></span>
                                               </li>
                                           </ul>
                                       </div>
                                   </li>
                               </ul>
                               <a href="">
                                   <i class="fa fa-cog"></i> Customize </a>
                           </li>
                       </ul>
                   </footer>
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
                                 <h2 class="title"> Cadastro de Setor</h2>
                                 <hr>
                              </div>
                              <form role="form" class="row" id="formulario" name="formulario" method="POST">

                                 <div class="form-group col-6">
                                    <label class="control-label">Setor: </label>
                                    <input type="text" id="setor" name="setor" required="required" class="form-control boxed" autofocus>
                                 </div>

                                 <div class="form-group col-2">
                                    <label class="control-label">Ramal: </label>
                                    <input type="text" id="ramal" name="ramal" required="required" class="form-control boxed">
                                 </div>

                                 <div class="form-group col-4">
                                    <label class="control-label">Coordenador:</label>
                                    <select class="form-control boxed" id="sexo" name="sexo" >
                                      <option>Selecione</option>
                                      <option>Ana</option>
                                      <option>Bob</option>
                                      <option>Pedro</option>
                                    </select>
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
                                                  <h3 class="title"> Setores cadastrados</h3>
                                              </div>

                                              <section class="example">
                                                  <div class="table-responsive" style="display: block;
                                                  max-height: 400px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
                                                      <table class="table table-striped table-bordered table-hover table-overflow">
                                                          <thead>
                                                              <tr>
                                                                  <th>#</th>
                                                                  <th>SETOR</th>
                                                                  <th>RAMAL</th>
                                                                  <th>COORDENADOR</th> 
                                                                  <th>AÇÃO</th>
                                                              </tr>
                                                          </thead>

                                                          <tbody>
                                                                  <td>1</td>
                                                                  <td>Núcleo de T.I</td>
                                                                  <td>1234</td>
                                                                  <td>José da Silva</td>
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
               <script src="js/vendor.js"></script>
               <script src="js/app.js"></script>
             </body>
</html>
