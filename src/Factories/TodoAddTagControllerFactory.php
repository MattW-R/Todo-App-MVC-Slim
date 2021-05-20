<?php

namespace App\Factories;

use App\Controllers\TodoAddTagController;
use Psr\Container\ContainerInterface;

class TodoAddTagControllerFactory {
    public function __invoke(ContainerInterface $container): TodoAddTagController {
        $todosModel = $container->get('TodosModel');
        return new TodoAddTagController($todosModel);
    }
}