<?php 
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
                $listaAnterior = $_POST["left"];
                switch ($listaAnterior) {
                    case "listaAFazer":
                    $listaAnterior = "a fazer";
                    break;
                    case "listaFazendo":
                    $listaAnterior = "fazendo";
                    break;
                    case "listaFeito":
                    $listaAnterior = "feito";
                    break;
                }
                $listaAtual = $_POST["right"];
                switch ($listaAtual) {
                    case "listaAFazer":
                    $listaAtual = "a fazer";
                    break;
                    case "listaFazendo":
                    $listaAtual = "fazendo";
                    break;
                    case "listaFeito":
                    $listaAtual = "feito";
                    break;
                }
                $idCartao = $_POST["responsibility"];
                $sql = mysqli_query($conecta,"UPDATE card_proj SET situacao='$listaAtual' WHERE card_proj.id_cartao=$idCartao");
                if(!$sql)
                                        die("Query Failed: " .  mysqli_error($conecta));

?>