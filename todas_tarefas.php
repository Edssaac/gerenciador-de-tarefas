<?php
$acao = 'recuperar';
require('tarefa_controller.php');
?>

<html>

<?php include('./includes/head.php') ?>

<body class="">
	<?php include('./includes/navbar.php') ?>

	<?= $mensagem ?>

	<div class="container app">
		<div class="row">
			<?php include('./includes/menu.php') ?>

			<div class="col-sm-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Todas tarefas</h4>
							<hr />

							<?php foreach ($tarefas as $tarefa) { ?>
								<div class="row mb-3 d-flex align-items-start tarefa">
									<div class="col-sm-9" id="tarefa_<?= $tarefa['id'] ?>">
										<?= $tarefa['tarefa'] ?> (<?= $tarefa['status'] ?>)
									</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i title="Excluir" class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa['id'] ?>)"></i>
										<?php if ($tarefa['id_status'] == 1) { ?>
											<i title="Editar" class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa['id'] ?>, '<?= $tarefa['tarefa'] ?>')"></i>
											<i title="Marcar" class="far fa-square fa-lg text-success" onclick="marcar(<?= $tarefa['id'] ?>)"></i>
										<?php } else if (1) { ?>
											<i title="Desmarcar" class="fas fa-check-square fa-lg text-success" onclick="desmarcar(<?= $tarefa['id'] ?>)"></i>
										<?php } ?>
									</div>
								</div>
								<hr>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>