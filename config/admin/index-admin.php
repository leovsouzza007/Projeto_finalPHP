<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Painel Administrativo - Meu Site</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS e JS -->
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
    }

    .content {
      flex: 1;
      padding: 40px 0;
    }

    .footer {
      background-color: #222;
      color: #fff;
      padding: 20px 0;
    }

    .footer a {
      color: #9d9d9d;
    }

    .footer a:hover {
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>
<body>

<!-- Navbar topo -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Painel Admin</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link"  href="?pg=cadastrar_clientes-admin"> Cadastar clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pg=cadastrar_quartos-admin"> cadastrar quartos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pg=excluir_clientes-admin">excluir cliente </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pg=editar_clientes-admin">editar cliente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pg=editar_quartos-admin">editar quartos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pg=excluir_quartos-admin">excluir quartos</a>
            </li>
      </ul>
    </div>
  </div>
</nav>





















