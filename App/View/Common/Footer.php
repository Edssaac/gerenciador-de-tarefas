</div>

</div>

<div class="modal" id="modalTaskRemove">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    &nbsp;
                    Atenção
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Tem certeza de que deseja remover esta tarefa?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="buttonRemove">Excluir</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalTaskViewer">
    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="task_name" class="mb-2">Nome:</label>
                        <input type="text" name="task_name" id="task_name" class="form-control" maxlength="100" required>
                    </div>

                    <div class="mb-3">
                        <label for="task_description" class="mb-2">Descrição:</label>
                        <textarea name="task_description" id="task_description" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-success" id="buttonUpdate">Salvar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalWarning">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-3">
            <div class="modal-body text-center ">
                <p>Não foi possível completar a ação no momento.</p>
                <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

</body>

</html>