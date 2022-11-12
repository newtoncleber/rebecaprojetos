<?php
session_start();
if (!isset($_SESSION['user'])){
    header('Location: loginform.php');
    exit;
}else{
    $user = $_SESSION['user'];
}

include('conexao.php');

$query = "select * from users_localizacao, localizacao 
            where users_localizacao.id_localizacao=localizacao.id 
            and users_localizacao.id_user='{$user["id"]}' 
            and localizacao.id_empresa='{$_SESSION["empresa"]}'";
$localizacoes = mysqli_query($conexao, $query);
$contlocal = mysqli_num_rows($localizacoes);
?>
<!DOCTYPE html>
<html lang="pt-br" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>Rebeca Systems</title>
    </head>
    <body>
        <main>
            <h1 class="md text-center my-2 versaomobile">Área do usuário</h1>
            <div class="container flex">
                <?php 
                echo "Olá " . $user["username"] .  ". Você está logado.";                
                ?>
                <a href="logout.php" target="_SELF">Sair</a>
                
                <h2 class="md text-center my-2 versaomobile">Localizações</h2>
                <?php if ($contlocal===0){?>
                    <h2> você não tem acesso </h2>
                <?php } ?>
                <div class="row">    
                <?php
                while ($local = mysqli_fetch_array($localizacoes)) {?>
                    <div class="col-6">
                            <a href="<?="/rebeca" . "/" . $local["nome"]?>" target="_SELF">
                                <?=$local["nome"]?>
                            </a>
                    </div>
                <?php } ?>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>