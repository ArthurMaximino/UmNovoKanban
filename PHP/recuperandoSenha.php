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
    <link rel="stylesheet" type="text/css" href="../CSS/recuperandoSenha.css">
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
                            <p>Pergunta de segurança</p>
                            <h4>
                            <?php
                                    session_start();
                                    $nome_servidor = "localhost";
                                    $nome_usuario = "root";
                                    $senha = "";
                                    $nome_banco = "cardtasker";
                                    $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
                                    if ($conecta->connect_error)
                                    die("Ocorreu uma falha na conexão". $conecta->connect_error."<br>");
                                    $nome_usuario = $_POST["primeiroNome"];
                                    $email = $_POST["email"];
                                    $sql = mysqli_query($conecta,"SELECT pergunta_seguranca FROM usuario  WHERE nome_usuario = '$nome_usuario' AND email = '$email'");
                                    if(!$sql)
                                        die("Query Failed: " .  mysqli_error($conecta));
                                    $resultado = mysqli_fetch_assoc($sql);
                                    if (sizeof($resultado) > 0)
                                    {
                                    echo $resultado["pergunta_seguranca"];
                                    $_SESSION['email'] = $email;
                                    }
                                    else 
                                    {
                                        unset ($_SESSION['email']);
                                        header("Location: ../HTML/semResultados.html");
                                    }
                                    ?></h4>
                        <div class="table-responsive">
                        <form id="formulario" action="../PHP/retornaSenha.php" method="POST">
                                    <div class="form-group">
                            <table id="Tabela">
                                    <tr>
                                        <td>
                                            <p id="altura">Resposta</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Sua resposta" name="resposta" id="estaResposta">
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                                <input type="submit" value="Submeter resposta" class="btn btn-outline-dark btn-block" name="envio" id="botaoEnvio">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td colspan="2" align="center">
                                        </td>
                                    </tr>
                            </table>
                            </div>
                            </form>
                            <p id="alinhar"><button onclick="window.location.href ='../HTML/home.html'" class="btn btn-outline-dark btn-block" id="Botao">Home</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>