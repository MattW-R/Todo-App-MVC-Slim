<?php

namespace App\Factories;

use App\Models\TodosModel;
use Psr\Container\ContainerInterface;

class TodosModelFactory {
    public function __invoke(ContainerInterface $container): TodosModel {
        $db = $container->get('db');
        return new TodosModel($db);
    }
}