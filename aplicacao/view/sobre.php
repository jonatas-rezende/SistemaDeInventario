
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
                                 <h2 class="title"> Desenvolvedores </h2>

                                 <hr>
                              </div>
                              <form role="form" class="row" id="formulario" name="formulario" method="POST">


                                <div class="col-md-2">

                                  <img src="brunog.jpg" class=" img-thumbnail rounded-circle img-fluid"  >
                                  <label>Bruno Geovane </label>
                                </div>
                                <div class="col-md-2">
                                  <img src="bruno.jpg" class=" img-thumbnail rounded-circle img-fluid"  >
                                  <label>Bruno Qualhato </label>

                                </div>
                                <div class="col-md-2">
                                  <img src="gilson.jpg" class=" img-thumbnail rounded-circle img-fluid"  >
                                  <label>Gilson Soares </label>

                                </div>
                                <div class="col-md-2">
                                  <img src="jonatas.jpg" class=" img-thumbnail rounded-circle img-fluid"  >
                                  <label>Jonatas Rezende </label>

                                </div>
                                <div class="col-md-2">
                                  <img src="luana.jpg" class=" img-thumbnail rounded-circle img-fluid"  >
                                  <label>Luana Queiros </label>
                                </div>
                                 </fieldset>


                                  <!---
                                 <div class="form-group col-4">
                                    <label class="control-label">Foto:</label>
                                    <img class="image-container" src="https://index.tnwcdn.com/images/9794fd32b7b694d7720d2e655049051b78604f09.jpg" ></img>
                                 </div>
                                 --->




   </div>
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
