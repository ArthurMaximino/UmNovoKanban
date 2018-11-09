<?php
session_start();
                                    $nome_servidor = "localhost";
                                    $nome_usuario = "root";
                                    $senha = "";
                                    $nome_banco = "cardtasker";
                                    $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
                                    if ($conecta->connect_error)
                                    die("Ocorreu uma falha na conexão". $conecta->connect_error."<br>");

                                    $email = $_POST["email"];
                                    $senha = $_POST["senha"];
                                    if($email!=''&& $senha!='')
{
 $query="select * from usuario where email='$email' and senha='$senha'";
 $resultado=mysqli_query($conecta,$query); 
 if(!$resultado)
    die("Query Failed: " .  mysqli_error($conecta));
else
{
if(mysqli_num_rows($resultado)>0)
    {
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header('location:dashboard.php');
    }
    
else
    {
    unset ($_SESSION['email']);
    unset ($_SESSION['senha']);
    header('location:../HTML/home.html');
    }
}
}
?>