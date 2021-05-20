<?php

namespace App\Factories;

use App\Controllers\AddTodoController;
use Psr\Container\ContainerInterface;

class AddTodoControllerFactory {
    public function __invoke(ContainerInterface $container): AddTodoController {
        $todosModel = $container->get('TodosModel');
        return new AddTodoController($todosModel);
    }
}