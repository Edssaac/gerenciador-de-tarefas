<?php

namespace App\Model;

use App\Model;
use PDO;

/**
 * Classe que representa a Tarefa.
 */
class TaskModel extends Model
{
    public function insert(array $data): bool
    {
        $this->query(
            "INSERT INTO task SET
				task_name = :task_name, 
				task_description = :task_description
			",
            $this->mapToBind($data)
        );

        return true;
    }

    public function getTask(int $task_id): array
    {
        $result = $this->query(
            "SELECT * FROM task 
                WHERE id = :task_id
            ",
            $this->mapToBind([
                "task_id" => $task_id
            ])
        );

        $task = $result->fetch(PDO::FETCH_ASSOC) ?? [];

        return $task;
    }

    public function getTasks(int $limit = 10, int $offset = 0): array
    {
        $result = $this->query(
            "SELECT * FROM task 
                ORDER BY id DESC
                LIMIT $limit 
                OFFSET $offset
            "
        );

        $tasks = $result->fetchAll(PDO::FETCH_ASSOC) ?? [];

        return $tasks;
    }

    public function getTotalTasks(): int
    {
        $result = $this->query(
            "SELECT count(*) FROM task"
        );

        $total = $result->fetchColumn() ?? 0;

        return $total;
    }

    public function update(array $task): bool
    {
        $this->query(
            "UPDATE task 
                SET task_name = :task_name, task_description = :task_description 
                WHERE id = :task_id
            ",
            $this->mapToBind([
                "task_id" => $task['task_id'],
                "task_name" => $task['task_name'],
                "task_description" => $task['task_description']
            ])
        );

        return true;
    }

    public function updateStatus(int $task_id, int $status): bool
    {
        $this->query(
            "UPDATE task 
                SET `status` = :status 
                WHERE id = :task_id
            ",
            $this->mapToBind([
                "task_id" => $task_id,
                "status" => $status
            ])
        );

        return true;
    }

    public function remove(int $task_id): bool
    {
        $this->query(
            "DELETE FROM task 
                WHERE id = :task_id
            ",
            $this->mapToBind([
                "task_id" => $task_id
            ])
        );

        return true;
    }
}
