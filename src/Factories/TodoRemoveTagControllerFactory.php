<?php

namespace App\Factories;

use App\Controllers\TodoRemoveTagController;
use Psr\Container\ContainerInterface;

class TodoRemoveTagControllerFactory {
    public function __invoke(ContainerInterface $container): TodoRemoveTagController {
        $todosModel = $container->get('TodosModel');
        return new TodoRemoveTagController($todosModel);
    }
}