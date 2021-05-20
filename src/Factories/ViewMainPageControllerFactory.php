<?php

namespace App\Factories;

use App\Controllers\ViewMainPageController;
use Psr\Container\ContainerInterface;

class ViewMainPageControllerFactory {
    public function __invoke(ContainerInterface $container): ViewMainPageController {
        $renderer = $container->get('renderer');
        return new ViewMainPageController($renderer);
    }
}