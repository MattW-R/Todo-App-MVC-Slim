<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'ViewMainPageController');
    $app->get('/todos', 'ViewAllTodosController');
    $app->post('/todos/add', 'AddTodoController');
    $app->post('/todos/edit', 'EditTodoController');
    $app->post('/todos/edit/done', 'EditDoneTodoController');
    $app->post('/todos/edit/addtag', 'TodoAddTagController');
    $app->post('/todos/edit/removetag', 'TodoRemoveTagController');
    $app->post('/todos/delete', 'DeleteTodoController');
    $app->get('/tags', 'ViewAllTagsController');
    $app->post('/tags/add', 'AddTagController');
    $app->post('/tags/edit', 'EditTagController');
    $app->post('/tags/delete', 'DeleteTagController');
};
