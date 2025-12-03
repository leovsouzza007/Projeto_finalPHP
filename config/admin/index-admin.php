<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Painel Administrativo - Meu Site</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      font-size: 18px;
    }

    .content {
      flex: 1;
      padding: 40px 0;
    }

    .container {
        width: 92% !important;
        max-width: 1500px !important;
    }

    .navbar {
        font-size: 18px;
        padding: 10px 0;
    }

    .navbar-brand {
        font-size: 22px !important;
    }

    .footer {
      background-color: #222;
      color: #fff;
      padding: 25px 0;
      text-align: center;
      margin-top: auto;
      font-size: 17px;
    }

    .footer a {
      color: #bfbfbf;
    }

    .footer a:hover {
      color: #fff;
    }
  </style>
</head>

<body>

<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="index-admin.php">Painel Admin</a>
    </div>
    
    <div class="collapse navbar-collapse" id="navbar-collapse">

      <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index-admin.php?page=ver_funcionarios-admin"> Ver Funcionários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index-admin.php?page=cadastrar_funcionarios-admin">Cadastrar Funcionários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index-admin.php?page=cadastrar_quartos-admin"> Cadastrar Quartos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index-admin.php?page=editar_quartos-admin"> Ver Quartos</a>
            </li>
      </ul>

    </div>
  </div>
</nav>

<div class="content">
    <div class="container">

        <?php
        if (empty($_GET['page'])) {
            echo "<div class='jumbotron'>
                    <h1>Bem-vindo, Administrador!</h1>
                    <p>Selecione uma opção no menu acima para gerenciar o sistema.</p>
                  </div>";
        } else {
            $page = basename($_GET['page']);
            $arquivo = $page . '.php';

            if (file_exists($arquivo)) {
                include_once($arquivo);
            } else {
                echo "<div class='alert alert-danger text-center'>
                        <h3>Erro 404</h3>
                        <p>A página <strong>{$arquivo}</strong> não foi encontrada.</p>
                      </div>";
            }
        }
        ?>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p>&copy; <?= date('Y'); ?> Hotel PHP - Painel Administrativo</p>
    </div>
</footer>

</body>
</html>