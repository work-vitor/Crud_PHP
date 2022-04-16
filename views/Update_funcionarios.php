<?php
include '../class/class_funcionario.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Funcionário</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>


    <?php


    ?>
    <div class="cad">



        <?php
        $id = $_GET['up'];
        $crud = new Funcionario();
        $BFetch = $crud->readFunc($id);



        foreach ($BFetch as $dados) {





        ?>
            
            <form class="form" method="POST" action="../class/class_funcionario.php">

                <input type="hidden" name="up" value="up">
                <input type="hidden" name="id" value="<?php echo $dados['id']; 
                                                                                    ?>">

                <h1>Editar Funcionário</h1>

                <h4>Nome:</h4>
                <input type="text" name="nome" placeholder="Insira nome:" value="<?php echo $dados['nome']; 
                                                                                    ?>">

                <h4>Cargo:</h4>
                <input type=" text" name="cargo" placeholder="Insira o cargo" value="<?php echo $dados['cargo']; 
                                                                                        ?>">

                <h4>Departamento:</h4>
                <input type=" text" name="depart" placeholder="Insira o departamento" value="<?php echo $dados['departamento']; 
                                                                                                ?>">

                <br>

                <button type=" submit">Enviar</button>
                <button type="reset">Limpar</button>

            </form>

        <?php
        }
        ?>

    </div>


</body>

</html>