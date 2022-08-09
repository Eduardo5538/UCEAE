<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/cadastro.css">
	<script src="js/cadastro.js"></script>
</head>
<body>
	<div class="titulo">
	<!--<img src="img/arrow.png">-->
	<h1 id="titulo">Quem seria você?</h1>
	<br><br>
	<h3><a href="index.php">Voltar</a></h3>
	</div>
	<form name="cadastro" id="frm_cadastro" method="POST" action="">
		<div class="container">

		<!-- ----------------- Card do aluno --------------- -->

			<div class="card" id="card_aluno" onclick="mostraFormAluno()">
				<div class="img">
					<img src="img/aluno.png">
				</div>
				<h1>Aluno</h1>
				<div class="content">
					<p>
						Sou um estudante/responsável em busca de cursos especiais!
					</p>
				</div>
			</div>

		<!-- ----------------- Card da Instituição --------------- -->

			<div class="card" id="card_instituicao" onclick="mostraFormInst()">
				<div class="img">
					<img src="img/Instituicao.png">
				</div>
				<h1>Instituição</h1>
				<div class="content">
					<p>
						Sou uma instituição focada no ensino especial!
					</p>
				</div>
			</div>
		</div>
	</form>
</body>
</html>