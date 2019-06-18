
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
                            <?php } else if(isset($_GET['excluir'])){?>
                            <div class='alert alert-success' role='alert'>
                                Registro Excluido !!
                            </div>
                            <?php } else if(isset($_GET['atualizar'])){?>
                            <div class='alert alert-success' role='alert'>
                                Registro Atualizado !!
                            </div>
                            <?php }?>

                           <div class="row card card-block sameheight-item">
                              <div class="title-block">
                                 <h2 class="title"> Cadastro de Item </h2>
                                 <hr>
                              </div>
                              <?php require_once '../controller/ItemController.php';?>
                              <form role="form" class="row" id="formulario" name="formulario" method="POST" action="../controller/ItemController.php">

                                 <div class="form-group col-3">
                                    <label class="control-label">Matrícula: </label>
                                    <input type="text" id="matricula" name="matricula" required="required" class="form-control boxed" autofocus>
                                 </div>

                                 <div class="form-group col-5">
                                    <label class="control-label">Modelo: </label>
                                    <input type="text" id="modelo" name="modelo" required="required" class="form-control boxed" placeholder="">

                                 </div>

                                 <div class="form-group col-4">
                                    <label class="control-label">Localização: </label>
                                    <input type="text" id="localizacao" name="localizacao" class="form-control boxed">
                                 </div>
                                 <div class="form-group col-3">
                                    <label class="control-label">Data Aquisição: </label>
                                    <input type="date" id="dataAquisicao" name="dataAquisicao" class="form-control boxed">
                                 </div>
                                 <div class="form-group col-3">
                                    <label class="control-label">Valor de Aquisição (R$): </label>
                                    <input type="text" id="valorAquisicao" name="valorAquisicao" class="form-control boxed">
                                 </div>                                 
                                 <div class="form-group col-3">
                                    <label class="control-label">Vida útil: </label>
                                    <input type="date" id="vidaUtil" name="vidaUtil" class="form-control boxed">
                                 </div>

                                 <div class="form-group col-10">
                                    <label class="control-label">Observação: </label>
                                    <input type="text" id="observacao" name="observacao" class="form-control boxed">
                                 </div>                                 

                                 </fieldset>


                                  <!---
                                 <div class="form-group col-4">
                                    <label class="control-label">Foto:</label>
                                    <img class="image-container" src="https://index.tnwcdn.com/images/9794fd32b7b694d7720d2e655049051b78604f09.jpg" ></img>
                                 </div>
                                 --->
                                 <div class="col-11" align="end">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-primary"
                                            value="Salvar">
                                        <input type="reset" class="btn btn-success" value="Novo" />
                                    </div>
                                    <?php if (listaItens() != null) {?>

                              <div class="col-md-12">
                                      <div class="card">
                                          <div class="card-block">
                                              <div class="card-title-block">
                                                  <h3 class="title"> Itens cadastrados</h3>
                                              </div>

                                              <section class="example">
                                                  <div class="table-responsive" style="display: block;
                                                  max-height: 400px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
                                                      <table class="table table-striped table-bordered table-hover table-overflow">
                                                          <thead>
                                                              <tr>
                                                                <th>Matricula</th>
                                                                <th>Modelo</th>
                                                                <th>Localização</th>
                                                                <th>Data Aquisição</th>
                                                                <th>Vida Útil</th>
                                                                <th>Situação</th>
                                                                
                                                                <th>Ação</th>
                                                              </tr>
                                                          </thead>

                                                         
                                                          <?php foreach (listaItens() as $item){?>
                                                            <tbody>
                                                                <tr data-id="<?= $item->id_item;?>">
                                                                    <td><?= $item->matricula;?></td>
                                                                    <td><?= $item->modelo;?></td>
                                                                    <td><?= $item->localizacao;?></td>
                                                                    <td><?= $item->data_aquisicao;?></td>
                                                                    <td><?= $item->vida_util;?></td>
                                                                    <td><?= $item->situacao;?></td>
                                                                  
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
  <?php include 'footer.php'; ?>

  <!-- The Modal -->
  <div class="modal fade" id="modal_atualizar">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                  <h4 class="modal-title">Atualizar Item</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                  <div class="col-12">
                      <form role="form" class="formulario_modal row" id="formulario_modal" required="true" name="formulario_modal" method="POST"
                          action="../controller/ItemController.php">

                          <div class="form-group col-6">
                              <label class="control-label">Matrícula: </label>
                              <input type="text" id="matricula_modal" name="matricula_modal" required="true" required="required"
                                  class="form-control boxed" autofocus>
                          </div>

                          <div class="form-group col-2">
                              <label class="control-label">Modelo: </label>
                              <input type="text" id="modelo_modal" required="true" name="modelo_modal" required="required"
                                  class="form-control boxed" placeholder="">

                          </div>

                          <div class="form-group col-4">
                              <label class="control-label">Localização: </label>
                              <input type="text" id="localizacao_modal" required="true" name="localizacao_modal" class="form-control boxed">
                          </div>

                          <div class="form-group col-4">
                              <label class="control-label">Data Aquisição: </label>
                              <input type="date" required="true" id="data_aquisicao_modal" name="data_aquisicao_modal"
                                  class="form-control boxed">
                          </div>

                          <div class="form-group col-2">
                              <label class="control-label">Valor Aquisição:</label>
                              <input type="text" id="valor_modal" required="true" name="valor_modal" class="form-control boxed">
                          </div>

                          <div class="form-group col-6">
                              <label class="control-label">Vida Útil: </label>
                              <input type="date" required="true" id="vida_util_modal" name="vida_util_modal"
                                  class="form-control boxed">
                          </div>

                          <div class="form-group col-4">
                              <label class="control-label">Observação: </label>
                              <input type="text" id="observacao_modal" required="true" name="observacao_modal" class="form-control boxed">
                          </div>


                          </fieldset>

                          <input type="hidden" name="id_item" id="id_item">

                          <!---
                          <div class="form-group col-4">
                          <label class="control-label">Foto:</label>
                          <img class="image-container" src="https://index.tnwcdn.com/images/9794fd32b7b694d7720d2e655049051b78604f09.jpg" ></img>
                          </div>
                          --->


                  </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                  <button type="button" class="atualizar_modal btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <input type="submit" id="atualizar_modal" name="atualizar_modal" class="btn btn-primary"
                      value="Atualizar">
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal -->
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

//remove o alerta de sucesso
$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});
//script para recuperar os dados do servidor e jogar os valores no modal
$(document).ready(function() {
    $('.editar_coor').on('click', function() {
        var user_id = $(this).parents('tr').data('id');
        console.log(user_id);
        $.ajax({
            type: 'POST',
            url: '../controller/ItemController.php',
            dataType: "json",
            data: { //array associativo com os dados do post
                'exibir_registro': 'sim',
                'id_para_atualizar': user_id //
            },
            success: function(data) {
                console.log(data);
                $('#matricula_modal').val(data.dados[0].matricula);
                $('#modelo_modal').val(data.dados[0].modelo);
                $('#localizacao_modal').val(data.dados[0].localizacao);
                $('#data_aquisicao_modal').val(data.dados[0].data_aquisicao);
                $('#valor_modal').val(data.dados[0].valor_aquisicao);
                $('#vida_util_modal').val(data.dados[0].vida_util);
                $('#observacao_modal').val(data.dados[0].observacao);

                $('#id_item').val(data.dados[0].id_item);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});
//dsdfsdf
var id = 0; //variavel para receber o id selecionado;

$('.btn_excluir').click(function() { // acao para reconhecer o click no botao;
    id = $(this).parents('tr').data('id'); // pega o id do botao selecionado;
    console.log(id);
});

//funcao para excluir o regstro
function excluir() {

    $.ajax({ // chamo o ajax
        type: 'POST', // falo que a requisicao vai ser post
        url: '../controller/ItemController.php', // passso a localizacao do arquivo
        data: { //array associativo com os dados do post
            'excluir_registro': 'sim',
            'id_exclusao': id //
        },
        success: function(
        msg) { //se deu certo, entra aqui passando o get para o true e recebendo o valor para exibir o alerta
            location.href = "../view/cadastro_item.php?excluir=true";
            //dispensa o alerta de sucesso

        }
    });
}
</script>

</html>
