<?php

namespace App\Factories;

use App\Controllers\ViewAllTagsController;
use Psr\Container\ContainerInterface;

class ViewAllTagsControllerFactory {
    public function __invoke(ContainerInterface $container): ViewAllTagsController {
        $tagsModel = $container->get('TagsModel');
        $renderer = $container->get('renderer');
        return new ViewAllTagsController($tagsModel, $renderer);
    }
}