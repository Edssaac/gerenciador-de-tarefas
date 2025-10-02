<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Task extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        if ($this->hasTable("task")) {
            return;
        }

        $this->table("task", ["id" => false, "primary_key" => "id"])
            ->addColumn("id", "integer", ["identity" => true])
            ->addColumn("status", "enum", ["values" => ["0", "1"], "default" => "0"])
            ->addColumn("task_name", "string", ["limit" => 100])
            ->addColumn("task_description", "string", ["limit" => 1000, "null" => true])
            ->addColumn("date_added", "datetime", ["default" => "CURRENT_TIMESTAMP"])
            ->create();
    }
}
