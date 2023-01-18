<?php

require('conexao.php');
require('tarefa.model.php');
require('tarefa.service.php');

$acao = $_GET['acao'] ?? ($acao ?? '');
$pagina = $_GET['pagina'] ?? 'index.php';

$conexao = new Conexao();
$tarefa = new Tarefa();

switch ($acao) {
    case 'inserir':
        $tarefa->__set('tarefa', $_POST['tarefa'] ?? '');

        $tarefaService = new TarefaService($conexao, $tarefa);

        if ($tarefaService->inserir()) {
            header('Location: ' . $pagina . '?inclusao=1');
        } else {
            header('Location: ' . $pagina . '?inclusao=0');
        }

        break;
    case 'recuperar':
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
        break;
    case 'atualizar':
        $tarefa->__set('id', $_POST['id'] ?? '');
        $tarefa->__set('tarefa', $_POST['tarefa'] ?? '');

        $tarefaService = new TarefaService($conexao, $tarefa);

        if ($tarefaService->atualizar()) {
            header('Location: ' . $pagina . '?atualizacao=1');
        } else {
            header('Location: ' . $pagina . '?atualizacao=0');
        }

        break;
    case 'remover':
        $tarefa->__set('id', $_GET['id'] ?? '');

        $tarefaService = new TarefaService($conexao, $tarefa);

        if ($tarefaService->remover()) {
            header('Location: ' . $pagina . '?exclusao=1');
        } else {
            header('Location: ' . $pagina . '?exclusao=0');
        }

        break;
    case 'marcar':
        $tarefa->__set('id', $_GET['id'] ?? '');
        $tarefa->__set('id_status', 2);

        $tarefaService = new TarefaService($conexao, $tarefa);

        $tarefaService->marcar();

        header('Location: ' . $pagina);

        break;
    case 'desmarcar':
        $tarefa->__set('id', $_GET['id'] ?? '');
        $tarefa->__set('id_status', 1);

        $tarefaService = new TarefaService($conexao, $tarefa);

        $tarefaService->marcar();

        header('Location: ' . $pagina);

        break;
    case 'recuperar_pendentes':
        $tarefa->__set('id_status', 1);

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperarPendentes();

        break;
}
