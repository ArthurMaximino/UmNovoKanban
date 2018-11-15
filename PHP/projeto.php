<!DOCTYPE html>
<html>
<head>
    <title>CardTasker</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Imagens/cardTaskerFavicon.ico" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/projeto.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/css?family=Dekko&amp;subset=latin-ext" rel="stylesheet"> 
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light" style="background-color: #ffff7e;">
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
  <a class="navbar-brand" href="dashboard.php" id="logoMenu">CardTasker</a>
  <button id="myBtn" class="btn btn-outline-dark">Novo cartão</button>
  </div>
  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
  <ul class="navbar-nav ml-auto">
            <li class="nav-item"><b>
                <a class="nav-link"><?php 
                session_start();
                if(!isset($_SESSION['email'])) 
                    header("Location: ../HTML/home.html");  
                $nome_servidor = "localhost";
                $nome_usuario = "root";
                $senha = "";
                $nome_banco = "cardtasker";
                $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
                if ($conecta->connect_error)
                die("Ocorreu uma falha na conexão". $conecta->connect_error."<br>");
                $email = $_SESSION['email'];
                $senha = $_SESSION['senha'];
                $query="select nome_usuario from usuario where email='$email' and senha='$senha'";
 $resultado=mysqli_query($conecta,$query); 
 $busca = mysqli_fetch_assoc($resultado);
 echo $busca["nome_usuario"];
                ?></a></b>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>
<div class="card text-white" id="barraLateral">
  <ul class="list-group list-group-flush">
  <?php  
                $nome_servidor = "localhost";
                $nome_usuario = "root";
                $senha = "";
                $nome_banco = "cardtasker";
                $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
                if ($conecta->connect_error)
                die("Ocorreu uma falha na conexão". $conecta->connect_error."<br>");
                $email = $_SESSION['email'];
                $pesquisa = mysqli_query($conecta, "select nome_projeto from projeto where email_usr='$email'");
 while ($linha = mysqli_fetch_array($pesquisa, MYSQLI_ASSOC))
 {    
     $proximaPagina = $linha["nome_projeto"];
    echo "<a href='projeto.php?paginaProjeto=".$proximaPagina."'><li class='list-group-item' id='elementoColorido'>".$linha["nome_projeto"]."</li></a>";
 }
                ?>
    <a href="novoProjeto.php"><li class="list-group-item" id="elementoColorido"><i class="material-icons">add_circle_outline</i></li></a>
  </ul>
</div>
</div>
<div id="snackbar">Mudança salva com sucesso!</div>

<!--A modal para criar um novo cartão-->
<div id="myModal" class="modal">

<div class="modal-content">
  <div id="desloca"><span class="close">&times;</span></div>
  <div class="table-responsive">
  <div class="form-group">
      <?php 
      
      ?>
  <form id="formulario" action="../PHP/inserirCartao.php?nomeProjeto=<?php $nomeProjeto = $_GET['paginaProjeto']; echo $nomeProjeto?>" method="POST">
  <table width="100%">
    <tr>
        <td>
        <input type="text" class="form-control" placeholder="Insira o texto do cartão" name="textoCartao">
        </td>
    </tr>
    <tr>
        <td>
        <select class="custom-select" name="situacao">
  <option selected>Escolha a situação do cartão</option>
  <option value="a fazer">A fazer</option>
  <option value="fazendo">Fazendo</option>
  <option value="feito">Feito</option>
</select>
        </td>
    </tr>
    <tr>
        <td>
        <input type="submit" value="Inserir" class="btn btn-outline-dark btn-block" name="inserir" id="botaoInserir">
        </td>
    </tr>

</table>
</form>
</div>
</div>
</div>

</div>

<div class="card bg-dark " id="bordas">

        <div class="card-img-overlay">
            <div align="center">


  <div class="container-fluid no-padding" id="campo">
  <div class="row">
    <div class="col" id="corAFazer">
      <h3>A FAZER</h3><hr>
    </div>
    <div class="col" id="corFazendo">
    <h3>FAZENDO</h3><hr>
    </div>
    <div class="col" id="corFeito">
    <h3>FEITO</h3><hr>
    </div>
  </div>
  <div class="row" id="linhaCard">
  <div class="col" id="corAFazer">
  <ul class="list-group list-group-flush connectedSortable" id="listaAFazer">
      <?php 
      $nome_servidor = "localhost";
      $nome_usuario = "root";
      $senha = "";
      $nome_banco = "cardtasker";
      $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
      if ($conecta->connect_error)
      die("Ocorreu uma falha na conexão". $conecta->connect_error."<br>");
      $email = $_SESSION['email'];
      $nomeProjeto = $_GET['paginaProjeto'];
      $sql = mysqli_query($conecta, "select id_projeto from projeto where email_usr = '$email' and nome_projeto='$nomeProjeto'");
      $busca = mysqli_fetch_assoc($sql);
      $buscaDefinitiva = $busca["id_projeto"];
      mysqli_set_charset($conecta, "utf8"); 
      $sql2 = mysqli_query($conecta, "select cartao.texto, cartao.id_cartao from cartao inner join card_proj on card_proj.id_cartao = cartao.id_cartao where card_proj.situacao = 'a fazer' and id_projeto='$buscaDefinitiva'");
      while ($linha = mysqli_fetch_array($sql2, MYSQLI_ASSOC))
      {    
        echo "<li id='". $linha["id_cartao"]."' class='list-group-item cartao'>".$linha["texto"]."</li>";
      }

      
      ?>
  </ul>
</div>
  <div class="col" id="corFazendo">
  <ul class="list-group list-group-flush connectedSortable" id="listaFazendo">
  <?php 
      $nome_servidor = "localhost";
      $nome_usuario = "root";
      $senha = "";
      $nome_banco = "cardtasker";
      $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
      if ($conecta->connect_error)
      die("Ocorreu uma falha na conexão". $conecta->connect_error."<br>");
      $email = $_SESSION['email'];
      $nomeProjeto = $_GET['paginaProjeto'];
      $sql = mysqli_query($conecta, "select id_projeto from projeto where email_usr = '$email' and nome_projeto='$nomeProjeto'");
      $busca = mysqli_fetch_assoc($sql);
      $buscaDefinitiva = $busca["id_projeto"];
      mysqli_set_charset($conecta, "utf8"); 
      $sql2 = mysqli_query($conecta, "select cartao.texto, cartao.id_cartao from cartao inner join card_proj on card_proj.id_cartao = cartao.id_cartao where card_proj.situacao = 'fazendo' and id_projeto='$buscaDefinitiva'");
      while ($linha = mysqli_fetch_array($sql2, MYSQLI_ASSOC))
      {    
         echo "<li id='". $linha["id_cartao"]."' class='list-group-item cartao'>".$linha["texto"]."</li>";
      }

      
      ?>
      </ul>
  </div>
  <div class="col" id="corFeito">
  <ul class="list-group list-group-flush connectedSortable" id="listaFeito">
  <?php 
      $nome_servidor = "localhost";
      $nome_usuario = "root";
      $senha = "";
      $nome_banco = "cardtasker";
      $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
      if ($conecta->connect_error)
      die("Ocorreu uma falha na conexão". $conecta->connect_error."<br>");
      $email = $_SESSION['email'];
      $nomeProjeto = $_GET['paginaProjeto'];
      $sql = mysqli_query($conecta, "select id_projeto from projeto where email_usr = '$email' and nome_projeto='$nomeProjeto'");
      $busca = mysqli_fetch_assoc($sql);
      $buscaDefinitiva = $busca["id_projeto"];
      mysqli_set_charset($conecta, "utf8"); 
      $sql2 = mysqli_query($conecta, "select cartao.texto, cartao.id_cartao from cartao inner join card_proj on card_proj.id_cartao = cartao.id_cartao where card_proj.situacao = 'feito' and id_projeto='$buscaDefinitiva'");
      while ($linha = mysqli_fetch_array($sql2, MYSQLI_ASSOC))
      {    
        echo "<li id='". $linha["id_cartao"]."' class='list-group-item cartao'>".$linha["texto"]."</li>";
      }

      
      ?>
      </ul>
  </div>
  </div>
</div>
</div>
</div>
</div>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
 <script>

$(function() {
        $( "#listaAFazer, #listaFazendo, #listaFeito" ).sortable({
            connectWith: ".connectedSortable",
            receive: function(event,ui){
                 console.log("old ui id = "+ui.sender.attr("id")+" new ul id = "+this.id+" li id "+$(ui.item).attr("id"));                   
                 if(ui.sender.attr("id") != this.id)
                 {  
                    //Your ajax call will come here


                            $.ajax({
                    type: "POST",
                    url: "arrastarESoltar.php", 
         // Write you //php mysql logic here you'll get all your data in logic.php file 
                  data: { left: ui.sender.attr("id"), right: this.id , responsibility:$(ui.item).attr("id") }
                }).done(function( msg ) {
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                            });
                 }
            }

        }).disableSelection();
    });
</script>

    <div class="footer col-md-12">
                <p id="easterEgg">© 2018-2018 Arthur Maximino All Rights Reserved</p>
            </div>
            <script src ="../Javascript/novoCartao.js"></script>
</body>
</html>



