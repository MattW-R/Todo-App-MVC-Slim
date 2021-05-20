<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'ViewAllTodosController');
    $app->post('/add', 'AddTodoController');
    $app->post('/edit', 'EditTodoController');
    $app->post('/edit/done', 'EditDoneTodoController');
    $app->post('/edit/addtag', 'TodoAddTagController');
    $app->post('/edit/removetag', 'TodoRemoveTagController');
    $app->post('/delete', 'DeleteTodoController');
    $app->post('/tags/add', 'AddTagController');
};
