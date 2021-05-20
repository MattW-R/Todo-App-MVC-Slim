<?php

namespace App\Factories;

use App\Models\TagsModel;
use Psr\Container\ContainerInterface;

class TagsModelFactory {
    public function __invoke(ContainerInterface $container): TagsModel {
        $db = $container->get('db');
        return new TagsModel($db);
    }
}