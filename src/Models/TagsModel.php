<?php

namespace App\Models;

class TagsModel {
    private $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function getAllTags(): array {
        $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $query = $this->db->prepare("SELECT `name`, `id` FROM `tags` WHERE `deleted` = 0;");
        $query->execute();
        return $query->fetchAll();
    }

    public function addTag(string $tag): void {
        $query = $this->db->prepare("INSERT INTO `tags` (`name`) VALUES (:Tag);");
        $query->bindParam(':Tag', $tag);
        $query->execute();
    }

    public function editTag(string $name, string $id): void {
        $query = $this->db->prepare("UPDATE `tags` SET `name` = :Name WHERE `id` = :Id;");
        $query->bindParam(':Name', $name);
        $query->bindParam(':Id', $id);
        $query->execute();
    }

    public function deleteTag(string $id): void {
        $query = $this->db->prepare("UPDATE `tags` SET `deleted` = 1 WHERE `id` = :Id; DELETE FROM `todos-tags` WHERE `tag-id` = :Id;");
        $query->bindParam(':Id', $id);
        $query->execute();
    }
}