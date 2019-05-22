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
                        <?php if (isset($_GET['salvo'])) {?>
                        <div class='alert alert-success' role='alert'>
                            Salvo com Sucesso!!
                        </div>
                        <?php }?>
                        <div class="col-md-12">
                            <div class="row card card-block sameheight-item">
                                <div class="title-block">
                                    <h2 class="title"> Cadastro de Coordenador </h2>
                                    <hr>
                                </div>
                                <?php require_once '../controller/CoordenadorController.php';?>
                                <form role="form" class="row" id="formulario" name="formulario" method="POST"
                                    action="../controller/CoordenadorController.php">

                                    <div class="form-group col-6">
                                        <label class="control-label">Nome: </label>
                                        <input type="text" id="nome" name="nome" required="required"
                                            class="form-control boxed" autofocus>
                                    </div>

                                    <div class="form-group col-2">
                                        <label class="control-label">CPF: </label>
                                        <input type="text" id="cpf" name="cpf" required="required"
                                            class="form-control boxed" placeholder="">

                                    </div>

                                    <div class="form-group col-4">
                                        <label class="control-label">Telefone: </label>
                                        <input type="text" id="telefone" name="telefone" class="form-control boxed">
                                    </div>

                                    <div class="form-group col-4">
                                        <label class="control-label">E-mail: </label>
                                        <input type="email" pattern="[^ @]*@[^ @]*" id="email" name="email"
                                            class="form-control boxed">
                                    </div>

                                    <div class="form-group col-2">
                                        <label class="control-label">Sexo:</label>
                                        <select class="form-control boxed" id="sexo" name="sexo">
                                            <option value="">Selecione</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="control-label">Endereço: </label>
                                        <input type="text" id="endereco" name="endereco" class="form-control boxed">
                                    </div>



                                    <div class="form-group col-4">
                                        <label class="control-label">Cidade: </label>
                                        <select class="form-control boxed" name="cidade" id="cidade">
                                            <option value="">Selecione</option>
                                            <?php foreach (listaCidades() as $cidades){?>
                                            <option id="<?= $cidades->id_cidade; ?>"
                                                value="<?= $cidades->id_cidade; ?>"><?= $cidades->nome;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label class="control-label">Senha: </label>
                                        <input type="password" id="senha" name="senha" class="form-control boxed">
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
                                    <?php if (listaCoordenadres() != null) {?>

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="card-title-block">
                                                    <h3 class="title"> Coordenador Cadastrado</h3>
                                                </div>

                                                <section class="example">
                                                    <div class="table-responsive"
                                                        style="display: block;
                                                  max-height: 400px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
                                                        <table
                                                            class="table table-striped table-bordered table-hover table-overflow">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nome</th>
                                                                    <th>CPF</th>
                                                                    <th>Telefone</th>
                                                                    <th>Email</th>
                                                                    <th>Cidade</th>
                                                                    <th>Ação</th>
                                                                </tr>
                                                            </thead>

                                                            <?php foreach (listaCoordenadres() as $coordenadores){?>
                                                            <tbody>
                                                                <td><?= $coordenadores->id_pessoa;?></td>
                                                                <td><?= $coordenadores->nome;?></td>
                                                                <td><?= $coordenadores->CPF;?></td>
                                                                <td><?= $coordenadores->telefone;?></td>
                                                                <td><?= $coordenadores->email;?></td>
                                                                <td><?= $coordenadores->cidade;?></td>
                                                                <td><button type="button" class="btn btn-success"
                                                                        data-toggle="modal"
                                                                        data-target="#modal_atualizar">Editar</button>
                                                                    <button type="button" id="btn_excluir" name="btn_excluir"
                                                                        class="btn btn-danger" data-idparaexclusao="<?= $coordenadores->id_pessoa;?>" data-toggle="modal" data-target="#modal_excluir">Excluir</button>
                                                                </td>
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
                    <h4 class="modal-title">Atualizar Coordenador</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-12">
                        <form role="form" class="row" id="formulario" name="formulario" method="POST"
                            action="../controller/CoordenadorController.php">

                            <div class="form-group col-6">
                                <label class="control-label">Nome: </label>
                                <input type="text" id="nome" name="nome" required="required" class="form-control boxed"
                                    autofocus>
                            </div>

                            <div class="form-group col-2">
                                <label class="control-label">CPF: </label>
                                <input type="text" id="cpf" name="cpf" required="required" class="form-control boxed"
                                    placeholder="">

                            </div>

                            <div class="form-group col-4">
                                <label class="control-label">Telefone: </label>
                                <input type="text" id="telefone" name="telefone" class="form-control boxed">
                            </div>

                            <div class="form-group col-4">
                                <label class="control-label">E-mail: </label>
                                <input type="email" pattern="[^ @]*@[^ @]*" id="email" name="email"
                                    class="form-control boxed">
                            </div>

                            <div class="form-group col-2">
                                <label class="control-label">Sexo:</label>
                                <select class="form-control boxed" id="sexo" name="sexo">
                                    <option value="">Selecione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label class="control-label">Endereço: </label>
                                <input type="text" id="endereco" name="endereco" class="form-control boxed">
                            </div>



                            <div class="form-group col-4">
                                <label class="control-label">Cidade: </label>
                                <select class="form-control boxed" name="cidade" id="cidade">
                                    <option value="">Selecione</option>
                                    <?php foreach (listaCidades() as $cidades){?>
                                    <option id="<?= $cidades->id_cidade; ?>" value="<?= $cidades->id_cidade; ?>">
                                        <?= $cidades->nome;?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label class="control-label">Senha: </label>
                                <input type="password" id="senha" name="senha" class="form-control boxed">
                            </div>
                            </fieldset>


                            <!---
<div class="form-group col-4">
   <label class="control-label">Foto:</label>
   <img class="image-container" src="https://index.tnwcdn.com/images/9794fd32b7b694d7720d2e655049051b78604f09.jpg" ></img>
</div>
--->
                            <div class="col-11" align="end">
                                <input type="submit" id="atualizar" name="atualizar" class="btn btn-primary" value="Atualizar">
                             
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>

            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="modal_excluirLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-danger" onclick="excluirComModal(this)">Excluir</button>
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
    

</script>
</html>