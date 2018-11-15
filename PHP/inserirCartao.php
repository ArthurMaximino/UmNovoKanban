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
                $nomeProjeto = $_GET['nomeProjeto'];
                $texto = $_POST["textoCartao"];
                $situacao = $_POST["situacao"];
                echo $nomeProjeto;
                
                mysqli_set_charset($conecta, "utf8");
                $sql = mysqli_query($conecta,"INSERT INTO cartao(texto) VALUES ('$texto')");
                if(!$sql)
                                       die("Query Failed: " .  mysqli_error($conecta));
                $conecta2 = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
                $sql2 = mysqli_query($conecta2,"SELECT id_projeto FROM projeto WHERE nome_projeto='$nomeProjeto'");
                
                $resultado = mysqli_fetch_array($sql2);
                $idprojeto = $resultado["id_projeto"];
                echo $idprojeto;

                $sql3 = mysqli_query($conecta,"SELECT id_cartao FROM cartao WHERE texto = '$texto'");
                $resultado = mysqli_fetch_array($sql3);
                $idcartao = $resultado["id_cartao"];
                $sql2 = mysqli_query($conecta2,"INSERT INTO card_proj(situacao, id_projeto, id_cartao) VALUES ('$situacao', $idprojeto, $idcartao)");
                header("location:projeto.php?paginaProjeto=".$nomeProjeto);




?>