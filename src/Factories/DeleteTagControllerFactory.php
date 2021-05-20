<?php

namespace App\Factories;

use App\Controllers\DeleteTagController;
use Psr\Container\ContainerInterface;

class DeleteTagControllerFactory {
    public function __invoke(ContainerInterface $container): DeleteTagController {
        $tagsModel = $container->get('TagsModel');
        return new DeleteTagController($tagsModel);
    }
}