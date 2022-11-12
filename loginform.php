<?php 
session_start();
if (isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}

$mensagem="";
if (isset($_SESSION['mensagem'])){
    $mensagem  = $_SESSION['mensagem'];
}
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
            <h2 class="md text-center my-2 versaomobile">Identificação do usuário</h2>
            <div class="container flex">
                <form method="POST" action="login.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
                <br/>
                <span style="color: red;"><?=$mensagem?></span>
                <br/>
                <br/>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>