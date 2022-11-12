<?php
include('conexao.php');
session_start();
if (isset($_GET["empresa"])){
    $_SESSION["empresa"] = $_GET["empresa"];
    header("location: /rebeca/local.php");
    exit;
}
$query = "select * from empresas";
$empresas = mysqli_query($conexao, $query);
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
            <div class="container flex">
                <h2 class="md text-center my-2 versaomobile">Empresas</h2>
                <div class="row">    
                <?php
                while ($empresa = mysqli_fetch_array($empresas)) {?>
                    <div class="col-6">
                            <a href="<?="/rebeca/index.php?empresa=" . $empresa["id"]?>" target="_SELF">
                                <?=$empresa["nome"]?>
                            </a>
                    </div>
                <?php } ?>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>