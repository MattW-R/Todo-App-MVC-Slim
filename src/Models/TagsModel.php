<?php

namespace App\Models;

class TagsModel {
    private $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function getAllTags(): array {
        $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $query = $this->db->prepare("SELECT `name`, `id` FROM `tags`;");
        $query->execute();
        return $query->fetchAll();
    }

    public function addTag(string $tag): void {
        $query = $this->db->prepare("INSERT INTO `tags` (`name`) VALUES (:Tag);");
        $query->bindParam(':Tag', $tag);
        $query->execute();
    }
}