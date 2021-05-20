<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function ($request, $response, $args) use ($container) {
        $todosModel = $container->get('TodosModel');
        $args['todos'] = $todosModel->getAllTodos();

        $tagsModel = $container->get('TagsModel');
        $args['tags'] = $tagsModel->getAllTags();

        $renderer = $container->get('renderer');
        return $renderer->render($response, "todosView.phtml", $args);
    });

    $app->post('/add', function ($request, $response, $args) use ($container) {
        $post = $request->getParsedBody();

        if ($post['todo'] != '') {
            $todosModel = $container->get('TodosModel');
            $todosModel->addTodo($post['todo']);
        }

        return $response->withHeader('Location', '/');
    });

    $app->post('/edit', function ($request, $response, $args) use ($container) {
        $post = $request->getParsedBody();

        if ($post['todo'] != '' && $post['id'] != '') {
            $todosModel = $container->get('TodosModel');
            $todosModel->editTodo($post['todo'], $post['id']);
        }

        return $response->withHeader('Location', '/');
    });

    $app->post('/edit/done', function ($request, $response, $args) use ($container) {
        $post = $request->getParsedBody();

        if ($post['todo'] != '' && $post['id'] != '') {
            $todosModel = $container->get('TodosModel');
            $todosModel->editDoneTodo($post['done'], $post['id']);
        }

        return $response->withHeader('Location', '/');
    });

    $app->post('/edit/addtag', function ($request, $response, $args) use ($container) {
        $post = $request->getParsedBody();

        if ($post['id'] != '' && $post['tagId'] != '') {
            $todosModel = $container->get('TodosModel');
            $todosModel->addTag($post['id'], $post['tagId']);
        }

        return $response->withHeader('Location', '/');
    });

    $app->post('/edit/removetag', function ($request, $response, $args) use ($container) {
        $post = $request->getParsedBody();

        if ($post['id'] != '' && $post['tagId'] != '') {
            $todosModel = $container->get('TodosModel');
            $todosModel->removeTag($post['id'], $post['tagId']);
        }

        return $response->withHeader('Location', '/');
    });

    $app->post('/delete', function ($request, $response, $args) use ($container) {
        $post = $request->getParsedBody();

        if ($post['id'] != '') {
            $todosModel = $container->get('TodosModel');
            $todosModel->deleteTodo($post['id']);
        }

        return $response->withHeader('Location', '/');
    });

    $app->post('/tags/add', function ($request, $response, $args) use ($container) {
        $post = $request->getParsedBody();

        if ($post['tag'] != '') {
            $tagsModel = $container->get('TagsModel');
            $tagsModel->addTag($post['tag']);
        }

        return $response->withHeader('Location', '/');
    });
};
