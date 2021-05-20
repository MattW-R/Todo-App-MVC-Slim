<?php

namespace App\Factories;

use App\Controllers\ViewAllTodosController;
use Psr\Container\ContainerInterface;

class ViewAllTodosControllerFactory {
    public function __invoke(ContainerInterface $container): ViewAllTodosController {
        $todosModel = $container->get('TodosModel');
        $tagsModel = $container->get('TagsModel');
        $renderer = $container->get('renderer');
        return new ViewAllTodosController($todosModel, $tagsModel, $renderer);
    }
}