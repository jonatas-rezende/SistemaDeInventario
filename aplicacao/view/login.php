<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="../assets/css/vendor.css">
    <link rel="stylesheet" id="theme-style" href="../assets/css/app-green.css">
    <link rel="stylesheet" id="theme-style" href="../assets/css/app.css">
   
</head>

<body class="loaded">
    <div class="auth">
        <div class="auth-container">
            <div class="card">
                <header class="auth-header">
                    <h1 class="auth-title">
                        <div class="logo">
                            <span class="l l1"></span>
                            <span class="l l2"></span>
                            <span class="l l3"></span>
                            <span class="l l4"></span>
                            <span class="l l5"></span>
                        </div> Sistema de Inventário
                    </h1>
                </header>
                <div class="auth-content">
                    <p class="text-center">Entre para Continuar</p>
                    <form id="login-form" action="../model/LoginService.php" method="POST" novalidate="novalidate">
                        <div class="form-group">
                            <label for="txt_cpf">CPF</label>
                            <input type="text" class="form-control underlined" name="cpf" id="txt_cpf"
                                placeholder="000.000.000-00" required=""> </div>
                        <div class="form-group">
                            <label for="txt_senha">Senha</label>
                            <input type="password" class="form-control underlined" name="senha" id="txt_senha"
                                placeholder="Senha" required=""> </div>
                        <div class="form-group">
                          
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Entrar</button>
                        </div>
                       
                    </form>
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

    <div class="responsive-bootstrap-toolkit">
        <div class="device-xs 				  hidden-sm-up"></div>
        <div class="device-sm hidden-xs-down hidden-md-up"></div>
        <div class="device-md hidden-sm-down hidden-lg-up"></div>
        <div class="device-lg hidden-md-down hidden-xl-up"></div>
        <div class="device-xl hidden-lg-down			  "></div>
    </div>
</body>

</html>
