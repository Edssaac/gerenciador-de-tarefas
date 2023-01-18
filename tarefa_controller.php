<?php

require_once('./app/tarefa_controller.php');

$mensagem = "";
$texto = "";
$classe = "";

if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) {
    $texto = "Tarefa inserida com sucesso!";
    $classe = "bg-success";
} else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 0) {
    $texto = "Não foi possível inserir a tarefa!";
    $classe = "bg-danger";
} else if (isset($_GET['atualizacao']) && $_GET['atualizacao'] == 1) {
    $texto = "Tarefa atualizada com sucesso!";
    $classe = "bg-success";
} else if (isset($_GET['atualizacao']) && $_GET['atualizacao'] == 0) {
    $texto = "Não foi possível atualizar a tarefa!";
    $classe = "bg-danger";
} else if (isset($_GET['exclusao']) && $_GET['exclusao'] == 1) {
    $texto = "Tarefa excluída com sucesso!";
    $classe = "bg-success";
} else if (isset($_GET['exclusao']) && $_GET['exclusao'] == 0) {
    $texto = "Não foi possível excluir a tarefa!";
    $classe = "bg-danger";
}

if (!empty($texto) && !empty($classe)) {
    $mensagem =
        "<div class='$classe pt-2 text-white d-flex justify-content-center'>
        <h5>$texto</h5>
    </div>
    ";
}
