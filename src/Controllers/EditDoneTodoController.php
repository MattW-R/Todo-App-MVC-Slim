<?php

namespace App\Controllers;

use App\Models\TodosModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EditDoneTodoController {
    private $todosModel;

    public function __construct(TodosModel $todosModel) {
        $this->todosModel = $todosModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response {
        $post = $request->getParsedBody();

        if ($post['todo'] != '' && $post['id'] != '') {
            $this->todosModel->editDoneTodo($post['done'], $post['id']);
        }

        return $response->withHeader('Location', '/todos');
    }
}