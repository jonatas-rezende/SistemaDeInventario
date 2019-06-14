<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Sistema de Inventário </title>
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

                                <?php require_once '../controller/EmprestimoController.php';?>

                                <form role="form" class="row" id="formulario" name="formulario" method="POST"
                                    action="../controller/EmprestimoController.php">

                                    <div class="form-group col-6">
                                        <label class="control-label">Funcionário:</label>
                                        <select class="form-control boxed" id="funcionarios" name="funcionarios"
                                            autofocus required="required">
                                            <option value="">Selecione</option>
                                            <?php foreach(listarFuncionario() as $funcionarios){?>
                                            <option value="<?= $funcionarios->id_pessoa?>"><?= $funcionarios->nome?>
                                            </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="control-label">Data de Empréstimo: </label>
                                        <input type="date" id="dataEmprestimo" name="dataEmprestimo" required="required"
                                            class="form-control boxed">
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="control-label">Data de Devolução: </label>
                                        <input type="date" id="dataDevolucao" name="dataDevolucao" required="required"
                                            class="form-control boxed" placeholder="">
                                    </div>
                                    <div class="col-11">
                                        <br>
                                    </div>

                                    <div class="col-11" align="end">
                                        <input type="submit" id="inserir_emprestimo" name="inserir_emprestimo"
                                            class="btn btn-primary" value="Inserir Itens">
                                        <input type="reset" class="btn btn-danger" value="Cancelar" />
                                    </div>
                                    <?php if (listarEmprestimo() != null) {?>

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="card-title-block">
                                                    <h3 class="title"> Empréstimos Realizados</h3>
                                                </div>
                                                <section class="example">
                                                    <div class="table-responsive"
                                                        style="display: block;
                                                          max-height: 400px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
                                                        <table
                                                            class="table table-striped table-bordered table-hover table-overflow">
                                                            <thead>
                                                                <tr>
                                                                    <th>Cód. Emprestimo</th>
                                                                    <th>Funcionário</th>
                                                                    <th>Data Empréstimo</th>
                                                                    <th>Data para Devolução</th>
                                                                    <th>Ação</th>
                                                                </tr>
                                                            </thead>
                                                            <?php foreach (listarEmprestimo() as $emprestimos){?>
                                                            <tbody>
                                                                <tr data-id="<?= $emprestimos->id_emprestimo;?>">
                                                                    <td><?= $emprestimos->id_emprestimo;?></td>
                                                                    <td><?= $emprestimos->funcionario;?></td>
                                                                    <td><?= $emprestimos->data;?></td>
                                                                    <td><?= $emprestimos->data_devolucao;?></td>
                                                                    <td><button type="button"
                                                                            class="editar_coor btn btn-success"
                                                                            data-toggle="modal"
                                                                            data-target="#modal_atualizar"
                                                                            id="editar_coor"
                                                                            name="editar_coor">Editar</button>
                                                                        <button type="button" name="btn_excluir"
                                                                            class="btn_excluir btn btn-danger"
                                                                            data-toggle="modal"
                                                                            data-target="#modal_excluir">Excluir</button>
                                                                            <a href="termoemprestimopdf.php" class="btn btn-warning"  target="_blank">
                                                                Termo
                                                                    </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <?php }?>
                                                        </table>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </div>
</body>
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

</html>