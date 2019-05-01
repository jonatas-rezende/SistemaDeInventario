<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Novo Aluno</title>
</head>
<body>

    <form method="post" action="../controller/coordenador.php?acao=inserir">
        
        <label>Nome:</label>
        <input type="text" name="nome" > <br><br>
        <label>CPF:</label>
        <input type="text" name="CPF" > <br><br>
        <label>Telefone:</label>
        <input type="text" name="telefone" > <br><br>
        <label>email:</label>
        <input type="text" name="email" > <br><br>
        <label>sexo:</label>
        <input type="text" name="sexo" > <br><br>
        <label>endereco:</label>
        <input type="text" name="endereco" > <br><br>
        <label>id_cidade:</label>
        <input type="text" name="id_cidade" > <br><br>
        <label>status:</label>
        <input type="text" name="status" > <br><br>
        <label>senha:</label>
        <input type="text" name="senha" > <br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>