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
                            <?php if (isset($_GET['salvo'])) {?>
                            <div class='alert alert-success' id='alert-success' name='alert-success' role='alert'>
                                Salvo com Sucesso!!
                            </div>
                            <?php }?>
                            <div class="row card card-block sameheight-item">
                                <div class="title-block">
                                    <h2 class="title"> Realizar Empréstimo </h2>

                                    <hr>
                                </div>

                                <?php require_once '../controller/EmprestimoController.php';?>

                                <form role="form" class="row" id="formulario" name="formulario" method="POST" action="../controller/EmprestimoController.php">


                                    <?php foreach (listarUltimoEmprestimo() as $ultimo_emprestimo){?>
                                    <div class="form-group col-6">
                                        <input type="hidden" id="idEmprestimo" name="idEmprestimo" value="<?php echo $ultimo_emprestimo->id_emprestimo; ?>">
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
                                        <input type="submit" id="cancelarr" name="cancelar" class="btn_excluir btn btn-danger" value="Cancelar" />
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
                                                        <th>#</th>
                                                        <th>Matrícula</th>
                                                        <th>Modelo</th>
                                                        <th>Observação</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>
                                                <?php foreach (listar_itens_emprestimo() as $itens_emprestimos){?>
                                                <tbody>
                                                    <tr data-id="<?= $itens_emprestimos->id_emprestimo;?>">
                                                        <td><?= $itens_emprestimos->id_item;?></td>
                                                        <td><?= $itens_emprestimos->matricula;?></td>
                                                        <td><?= $itens_emprestimos->modelo;?></td>
                                                        <td><?= $itens_emprestimos->observacao;?></td>
                                                        <td><button type="button" name="btn_excluir"
                                                                class="btn_excluir btn btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#modal_excluir">Excluir</button>
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
    <div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="modal_excluirLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_excluirLabel">ATENÇÃO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger" onclick="excluir()">Excluir</button>
                </div>
            </div>
        </div>
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
<script>

$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});

var id = 0; //variavel para receber o id selecionado;
var item = 0;
$('.btn_excluir').click(function() { // acao para reconhecer o click no botao;
    id = $(this).parents('tr').data('id'); // pega o id do botao selecionado;
    item = $('.table td').eq(0).text();
    console.log(id);
    console.log(item);
});

//funcao para excluir o regstro
function excluir() {

    $.ajax({ // chamo o ajax
        type: 'POST', // falo que a requisicao vai ser post
        url: '../controller/EmprestimoController.php', // passso a localizacao do arquivo
        data: { //array associativo com os dados do post
            'excluir_registro': 'sim',
            'id_exclusao': id,
            'id_item': item
        },
        success: function(
        msg) { //se deu certo, entra aqui passando o get para o true e recebendo o valor para exibir o alerta
            location.href = "../view/cadastro_itens_emprestimo.php";
            //dispensa o alerta de sucesso

        }
    });
}
</script>
</html>