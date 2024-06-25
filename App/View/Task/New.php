<?php if (isset($data['message'])) { ?>
    <div class='alert alert-<?= $data['message_type'] ?> mt-4 text-center' role='alert'>
        <?= $data['message'] ?>
    </div>
<?php } ?>

<div class="container container-body">
    <div class="row">
        <div class="col">
            <div>
                <h4>Nova Tarefa</h4>
                <hr>
            </div>

            <div class="alert d-none" role="alert"></div>

            <form>
                <div class="mb-3">
                    <label for="task_name" class="mb-2">Nome:</label>
                    <input type="text" name="task_name" id="task_name" class="form-control clearable" maxlength="100" required>
                </div>

                <div class="mb-3">
                    <label for="task_description" class="mb-2">Descrição:</label>
                    <textarea name="task_description" id="task_description" class="form-control"></textarea>
                </div>

                <button class="btn" id="buttonAppend">Cadastrar</button>
            </form>
        </div>
    </div>
</div>