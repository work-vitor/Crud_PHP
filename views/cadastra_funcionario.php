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
    
<div class="cad">

		<form class="form" method="POST" action="../class/class_funcionario.php">

            <input type="hidden" name="op" value="cad">
			
			<h1>Cadastrar Funcionário</h1>

			<h4>Nome:</h4>
			<input type="text" name="nome" placeholder="Insira nome:" ">

            <h4>Cargo:</h4>
            <input type="text" name="cargo" placeholder="Insira o cargo" ">

            <h4>Departamento:</h4>
            <input type="text" name="depart" placeholder="Insira o departamento" ">

		<br>

        <button>Enviar</button>

	</form>

</div>


</body>
</html>