<?php

namespace App\Factories;

use App\Controllers\EditTodoController;
use Psr\Container\ContainerInterface;

class EditTodoControllerFactory {
    public function __invoke(ContainerInterface $container): EditTodoController {
        $todosModel = $container->get('TodosModel');
        return new EditTodoController($todosModel);
    }
}