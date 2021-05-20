<?php

namespace App\Factories;

use App\Controllers\EditDoneTodoController;
use Psr\Container\ContainerInterface;

class EditDoneTodoControllerFactory {
    public function __invoke(ContainerInterface $container): EditDoneTodoController {
        $todosModel = $container->get('TodosModel');
        return new EditDoneTodoController($todosModel);
    }
}