<?php

namespace App\Models;

class TodosModel {
    private $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function getAllTodos(array $filterTags = []): array {
        $queryString = "SELECT `todos`.`id`, `todos`.`todo`, `todos`.`done`, GROUP_CONCAT(`tags`.`id` SEPARATOR ',') AS 'tags', GROUP_CONCAT(`tags`.`name` SEPARATOR ',') AS 'tagNames' FROM `todos` LEFT JOIN `todos-tags` ON `todos`.`id` = `todos-tags`.`todo-id` LEFT JOIN `tags` ON `todos-tags`.`tag-id` = `tags`.`id` WHERE `todos`.`deleted` = 0 GROUP BY `todos`.`id`";
        if (count($filterTags) > 0) {
            $queryString .= " HAVING `tagNames` LIKE CONCAT('%', :" . $filterTags[0] . ", '%')";
            for ($i = 1; $i < count($filterTags); $i++) {
                $queryString .= " AND `tagNames` LIKE CONCAT('%', :" . $filterTags[$i] . ", '%')";
            }
        }
        $queryString .= ";";
        $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $query = $this->db->prepare($queryString);
        foreach ($filterTags as $filterTag) {
            $query->bindValue(':' . $filterTag, $filterTag);
        }
        $query->execute();
        return $query->fetchAll();
    }

    public function addTodo(string $todo): void {
        $query = $this->db->prepare("INSERT INTO `todos` (`todo`) VALUES (:Todo);");
        $query->bindParam(':Todo', $todo);
        $query->execute();
    }

    public function editTodo(string $todo, string $id): void {
        $query = $this->db->prepare("UPDATE `todos` SET `todo` = :Todo WHERE `id` = :Id;");
        $query->bindParam(':Todo', $todo);
        $query->bindParam(':Id', $id);
        $query->execute();
    }

    public function editDoneTodo(string $done, string $id): void {
        $query = $this->db->prepare("UPDATE `todos` SET `done` = :Done WHERE `id` = :Id;");
        $query->bindParam(':Done', $done);
        $query->bindParam(':Id', $id);
        $query->execute();
    }

    public function deleteTodo(string $id): void {
        $query = $this->db->prepare("UPDATE `todos` SET `deleted` = 1 WHERE `id` = :Id;");
        $query->bindParam(':Id', $id);
        $query->execute();
    }

    public function addTag(string $id, string $tagId): void {
        $query = $this->db->prepare("INSERT INTO `todos-tags` (`todo-id`, `tag-id`) VALUES (:TodoId, :TagId);");
        $query->bindParam(':TodoId', $id);
        $query->bindParam(':TagId', $tagId);
        $query->execute();
    }

    public function removeTag(string $id, string $tagId): void {
        $query = $this->db->prepare("DELETE FROM `todos-tags` WHERE (`todo-id`, `tag-id`) = (:TodoId, :TagId);");
        $query->bindParam(':TodoId', $id);
        $query->bindParam(':TagId', $tagId);
        $query->execute();
    }
}