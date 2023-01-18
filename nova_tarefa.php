<?php
require('tarefa_controller.php');
?>

<html>

<?php include('./includes/head.php') ?>

<body>
	<?php include('./includes/navbar.php') ?>

	<?= $mensagem ?>

	<div class="container app">
		<div class="row">
			<?php include('./includes/menu.php') ?>

			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Nova tarefa</h4>
							<hr />

							<form method="post" action="tarefa_controller.php?pagina=nova_tarefa.php&acao=inserir">
								<div class="form-group">
									<label>Descrição da tarefa:</label>
									<input type="text" name="tarefa" class="form-control" placeholder="Exemplo: Estudar para a prova de física.">
								</div>

								<button class="btn btn-success">Cadastrar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>