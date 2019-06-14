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

                                <form role="form" class="row" id="formulario" name="formulario" method="POST" action="../controller/EmprestimoController.php">


                                    <?php foreach (listarUltimoEmprestimo() as $ultimo_emprestimo){?>
                                    <div class="form-group col-6">
                                        <input type="hidden" name="idEmprestimo" value="<?php echo $ultimo_emprestimo->id_emprestimo; ?>">
                                        <label class="control-label">Funcionário:</label>
                                        <input type="text" id="dataEmprestimo" name="dataEmprestimo" 
                                        value="<?php echo $ultimo_emprestimo->funcionario; ?>" class="form-control boxed" disabled>
                                        
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="control-label">Data de Empréstimo: </label>
                                        <input type="text" id="dataEmprestimo" name="dataEmprestimo" 
                                        value="<?php echo $ultimo_emprestimo->data; ?>" class="form-control boxed" disabled>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="control-label">Data de Devolução: </label>
                                        <input type="text" id="dataEmprestimo" name="dataEmprestimo" 
                                        value="<?php echo $ultimo_emprestimo->data_devolucao; ?>" class="form-control boxed" disabled>
                                    </div>
                                    <?php }?>



                                    <div class="col-11" align="end">
                                        <br><br>
                                        <h2 class="title" > Inserir Itens </h2>
                                        <hr>
                                    </div>

                                    <div class="form-group col-10">
                                        <label class="control-label">Escolha o Item:</label>
                                        <select class="form-control boxed" id="modeloItem" name="modeloItem">
                                            <option value="">Selecione</option>
                                            <?php foreach(listarItem() as $itens){?>
                                                <option value="<?= $itens->id_item?>"><?= $itens->modelo?>
                                                    </option>
                                            <?php }?>
                                        </select>
                                    </div>

                                   
                                    <div class="col-11" align="end">
                                        <br>
                                        <input type="submit" id="incluir_item" name="incluir_item" class="btn btn-primary"
                                            value="Incluir Item"/>
                                        <input type="reset" class="btn_excluir btn btn-danger" value="Cancelar" />
                                        <input type="submit" id="finalizar" name="finalizar" class="btn btn-primary"
                                            value="Finalizar Empréstimo"/>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php if (listar_itens_emprestimo() != null) {?>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <div class="card-title-block">
                                        <h3 class="title"> Itens Incluídos no Empréstimo</h3>
                                    </div>
                                    <section class="example">
                                        <div class="table-responsive"
                                                    style="display: block;
                                              max-height: 400px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
                                            <table class="table table-striped table-bordered table-hover table-overflow">
                                                <thead>
                                                    <tr>
                                                        <th>Matrícula</th>
                                                        <th>Modelo</th>
                                                        <th>Observação</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>
                                                <?php foreach (listar_itens_emprestimo() as $itens_emprestimos){?>
                                                <tbody>
                                                    <tr data-id="<?= $itens_emprestimos->id_emprestimo;?>">
                                                        <td><?= $itens_emprestimos->matricula;?></td>
                                                        <td><?= $itens_emprestimos->modelo;?></td>
                                                        <td><?= $itens_emprestimos->observacao;?></td>
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
                    </div>
                </section>
            </article>
        </div>
    </div>
</body>

</html>