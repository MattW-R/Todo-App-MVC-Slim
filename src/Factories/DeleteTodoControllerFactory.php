<?php

namespace App\Factories;

use App\Controllers\DeleteTodoController;
use Psr\Container\ContainerInterface;

class DeleteTodoControllerFactory {
    public function __invoke(ContainerInterface $container): DeleteTodoController {
        $todosModel = $container->get('TodosModel');
        return new DeleteTodoController($todosModel);
    }
}