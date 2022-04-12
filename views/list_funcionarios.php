<?php
include '../class/class_funcionario.php';


if(isset($_GET['id'])){

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionarios</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <div class="cad">
        <div id="content">
            <table class="tabelaCrud">
                <tr>
                    <td>Nome:</td>
                    <td>Cargo:</td>
                    <td>Depatamento:</td>
                    <td>Ações</td>
                </tr>

                <?php
                $crud = new Funcionario();
                $BFetch = $crud->readFunc();

                foreach ($BFetch as $dados) {


                ?>
                    <tr>
                        <td><?php echo $dados['nome'] ?></td>
                        <td><?php echo $dados['cargo'] ?></td>
                        <td><?php echo $dados['departamento'] ?></td>

                        <td>
                            <a href="<?php echo "list_funcionario.php?id={$dados['id']}"; ?>"><img src="https://img.icons8.com/material/24/000000/edit.png"></a>
                            <a class="Deletar" href="<?php echo "../class/class_funcionario.php?id={$dados['id']}"; ?>"><img src="https://img.icons8.com/material/24/000000/delete.png"></a>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </table>
        </div>
    </div>
</body>

</html>