<?php
session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../loginform.php');
    exit;
}else{
    $user = $_SESSION['user'];
}

include('../conexao.php');

// precisa de 3 tabelas no total: uma com usuario,senha,nome, etc... ; uma com as informações do projeto, titulo, href,linmk da imagem; e a 
// outra que vai RELACIOAR essas duas. Ou seja, precisamos puxar O ID DO USUÁRIO DA PRIMEIRA TABELA = ID NA TABELA QUE CORRELACIONA e 
// puxar tambem o ID DO PROJETO DA TABELA DE PROJETOS = ID DO PROJETO NA TABELA QUE CORRELACIONA
$query = "select * from users_projetos, projetos where projetos.id=users_projetos.id_projeto and users_projetos.id_user='{$user["id"]}' and projetos.id_localizacao=1";
$projetos = mysqli_query($conexao, $query);

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
                <a href="/rebeca/logout.php" target="_SELF">Sair</a>

                <h2 class="md text-center my-2 versaomobile">Projetos disponíveis</h2>
                <div class="row">    
                <?php
                while ($projeto = mysqli_fetch_array($projetos)) {?>
                    <div class="col-6">
                        <h3><?=$projeto["titulo"]?></h3>
                        <div>
                            <a href="<?=$projeto["link"]?>" target="_SELF">
                                <img src="<?=$projeto["imagem"]?>" alt="Imagem do projeto" class="img-fluid"/>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>