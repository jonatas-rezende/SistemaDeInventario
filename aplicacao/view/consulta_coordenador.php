<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Sistema de Invetário </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
                                    <h2 class="title"> Consultar Coordenador </h2>

                                    <hr>
                                </div>
                                <form role="form" class="row" id="formulario" name="formulario" method="POST">


                                    </fieldset>


                                    <!---
                                 <div class="form-group col-4">
                                    <label class="control-label">Foto:</label>
                                    <img class="image-container" src="https://index.tnwcdn.com/images/9794fd32b7b694d7720d2e655049051b78604f09.jpg" ></img>
                                 </div>
                                 --->

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="card-title-block">

                                                    <div class="form-group col-4">
                                                        <!-- <label class="control-label">Buscar: </label> -->
                                                            <!-- <input type="search" id='buscar' name="buscar"
                                                                class="form-control boxed buscar" autofocus> -->
                                                    </div>
                                                </div>

                                                <section class="example">
                                                    <div class="table-responsive"
                                                        style="display: block;
                                                  max-height: 400px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
                                                        <table id='tabela' name='tabela'
                                                            class="table table-striped table-bordered table-hover table-overflow dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nome</th>
                                                                    <th>Setor</th>
                                                                    <th>Ramal</th>
                                                                </tr>
                                                            </thead>


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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {

        var resultados = [];

        $.ajax({
            type: 'POST',
            url: '../controller/CoordenadorController.php',
            dataType: "json",
            data: { //array associativo com os dados do post
                'filtrar': 'sim',
            },
            success: function(data) {
                console.log('foi');
                resultados = data;
                console.log(resultados[0]);
            },
            error: function(data) {
                console.log('erro');
                console.log(data);
            }
        });

        $('#tabela').DataTable({
            ajax: resultados[0],
           // data: resultados[0],
            columns: [{
                title: "id"
            }, {
                title: "nome"
            }, {
                title: "setor"
            }, {
                title: "ramal"
            }]
        });

    });
    </script>

</body>

</html>