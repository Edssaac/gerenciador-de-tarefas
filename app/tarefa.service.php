<?php

// CRUD
class TarefaService
{
    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa)
    {
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }

    public function inserir() // Create
    {
        $query = 'INSERT INTO tb_tarefas (tarefa) VALUES (:tarefa);';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));

        return $stmt->execute();
    }

    public function recuperar() // Read
    {
        $query = 'SELECT 
            t.id, t.id_status, t.tarefa, s.status 
            FROM tb_tarefas as t
            LEFT JOIN tb_status as s 
            ON t.id_status = s.id
            ORDER BY t.id_status;
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recuperarPendentes() // Read
    {
        $query = 'SELECT 
            t.id, t.id_status, t.tarefa, s.status 
            FROM tb_tarefas as t
            LEFT JOIN tb_status as s 
            ON t.id_status = s.id
            WHERE t.id_status = (:id_status);
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizar() // Update
    {
        $query = 'UPDATE tb_tarefas 
            SET tarefa = (:tarefa)
            WHERE id = (:id);
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));

        return $stmt->execute();
    }

    public function remover() // Delete
    {
        $query = 'DELETE FROM tb_tarefas WHERE id = (:id);';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));

        return $stmt->execute();
    }

    public function marcar()
    {
        $query = 'UPDATE tb_tarefas 
            SET id_status = (:id_status)
            WHERE id = (:id);
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));

        return $stmt->execute();
    }
}
