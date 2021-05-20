<?php

namespace App\Factories;

use App\Controllers\AddTagController;
use Psr\Container\ContainerInterface;

class AddTagControllerFactory {
    public function __invoke(ContainerInterface $container): AddTagController {
        $tagsModel = $container->get('TagsModel');
        return new AddTagController($tagsModel);
    }
}