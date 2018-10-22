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
    <link rel="stylesheet" type="text/css" href="../CSS/cadastrar.css">
</head>
<body>
    <div class="card bg-dark text-white">
        <img class="card-img">
        <div class="card-img-overlay">
            <div align="center">
            <div class="card border-dark mb-3" style="max-width: 30rem;" id="borderCard">
                <div class="card-body text-dark">
                    <div align="center">
                            <img src="../Imagens/cardTaskerLogoAjustado.png" class="img-fluid" alt="Responsive image">
                        <div class="table-responsive">
                            <table id="Tabela">
                                    <tr><td><?php
                                    $nome_servidor = "localhost";
                                    $nome_usuario = "root";
                                    $senha = "";
                                    $nome_banco = "cardtasker";
                                    $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
                                    if ($conecta->connect_error)
                                    die("Ocorreu uma falha na conexão". $conecta->connect_error."<br>");
                                    $email = $_POST["email"];
                                    $nome_usuario = $_POST["primeiroNome"];
                                    $senha = $_POST["senha"];
                                    $pergunta_seguranca = $_POST["pergunta"];
                                    $resposta_pergunta = $_POST["resposta"];
                                    $sql = mysqli_query($conecta,"INSERT INTO usuario (email, nome_usuario, senha, pergunta_seguranca, resposta_seguranca) VALUES ('$email','$nome_usuario', '$senha', '$pergunta_seguranca', '$resposta_pergunta')");
                                    if(!$sql)
                                        die("Query Failed: " .  mysqli_error($conecta));
                                    else
                                    echo "Cadastro realizado com sucesso!";
                                    ?></td></tr>
                                    <tr>
                                        <td>
                                                <button onclick="window.location.href ='../HTML/home.html'" class="btn btn-outline-dark btn-block" id="Botao">Home</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                                <button onclick="window.location.href ='../HTML/cadastro.html'" class="btn btn-outline-dark btn-block" id="Botao">Fazer Novo Cadastro</button>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>