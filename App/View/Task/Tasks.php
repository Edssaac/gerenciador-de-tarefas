<div class="container container-body">
    <div class="row">
        <div class="col">
            <div>
                <h4>Tarefas</h4>
                <hr>
            </div>

            <?php foreach ($data['tasks'] as $task) { ?>
                <div class="row d-flex align-items-center">
                    <div class="col-sm-9 py-3">
                        <p class="task-name" data-id="<?= $task['id'] ?>"><?= $task['task_name'] ?></p>
                    </div>
                    <div class="col-sm-3 py-3 d-flex justify-content-around taskActions" data-id="<?= $task['id'] ?>">
                        <i title="Excluir" class="fas fa-trash-alt fa-lg text-danger" data-action="remove"></i>
                        <i title="Visualizar e Editar" class="fas fa-edit fa-lg text-success" data-action="edit"></i>
                        <?php if ($task['status'] == 1) { ?>
                            <i title="Desmarcar" class="fas fa-check-square fa-lg text-info" data-action="uncheck"></i>
                        <?php } else { ?>
                            <i title="Marcar" class="far fa-square fa-lg text-info" data-action="check"></i>
                        <?php } ?>
                    </div>
                    <hr>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php if ($data['total_tasks']) { ?>
    <nav>
        <ul class="pagination justify-content-start py-4">
            <?php for ($page = 1; $page <= $data['total_tasks']; $page++) { ?>
                <li class="page-item <?= ($page == $data['page'] ? "active" : "") ?>">
                    <a class="page-link" href="/task/tasks?page=<?= $page ?>"><?= $page ?></a>
                </li>
            <?php } ?>
        </ul>
    </nav>
<?php } ?>