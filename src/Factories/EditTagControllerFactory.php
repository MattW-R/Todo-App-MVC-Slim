<?php

namespace App\Factories;

use App\Controllers\EditTagController;
use Psr\Container\ContainerInterface;

class EditTagControllerFactory {
    public function __invoke(ContainerInterface $container): EditTagController {
        $tagsModel = $container->get('TagsModel');
        return new EditTagController($tagsModel);
    }
}