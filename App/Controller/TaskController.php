<?php

namespace App\Controller;

use App\Controller;
use App\Model\TaskModel;

/**
 * Controller responsável por representar a Tarefa.
 */
class TaskController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = 'Tarefeiro';
    }

    public function new(): void
    {
        $this->data['content'] = 'Task/New';

        if (isset($_SESSION['INTERNAL_SITUATION']) && $_SESSION['INTERNAL_SITUATION'] === 500) {
            $this->data['message'] = 'Não foi possível acessar o recurso no momento. 
                Tente novamente e se o erro persistir entre em contato com o suporte.
            ';

            $this->data['message_type'] = 'danger';
        }

        session_destroy();

        $this->render($this->data);
    }

    public function tasks(): void
    {
        $this->data['content'] = 'Task/Tasks';

        $limit = 10;

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $offset = $limit * ($_GET['page'] - 1);
            $this->data['page'] = $_GET['page'];
        } else {
            $offset = 0;
            $this->data['page'] = 1;
        }

        $task = new TaskModel();

        $this->data['tasks'] = $task->getTasks($limit, $offset);
        $this->data['total_tasks'] = ceil($task->getTotalTasks() / $limit);

        $this->render($this->data);
    }

    public function append(): void
    {
        $json = [];

        if (!empty($_POST['task_name'])) {
            $task = new TaskModel();

            $json['success'] = $task->insert($_POST);
        } else {
            $json['message'] = 'Nome tem que ser preenchido.';
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function getTask(): void
    {
        $json = [];

        if (!empty($_POST['task_id'])) {
            $task = new TaskModel();

            $json['success'] = $task->getTask($_POST['task_id']);
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function update(): void
    {
        $json = [];

        if (!empty($_POST['task_id']) && !empty($_POST['task_name'])) {
            $task = new TaskModel();

            $json['success'] = $task->update($_POST);
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function updateStatus(): void
    {
        $json = [];

        if (!empty($_POST['task_id']) && isset($_POST['status'])) {
            $task = new TaskModel();

            $json['success'] = $task->updateStatus($_POST['task_id'], $_POST['status']);
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function remove(): void
    {
        $json = [];

        if (!empty($_POST['task_id'])) {
            $task = new TaskModel();

            $json['success'] = $task->remove($_POST['task_id']);
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }
}
