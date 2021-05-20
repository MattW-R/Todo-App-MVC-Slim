<?php

namespace App\Controllers;

use App\Models\TodosModel;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TodoRemoveTagController {
    private $todosModel;

    public function __construct(TodosModel $todosModel) {
        $this->todosModel = $todosModel;
    }

    public function __invoke(Request $request, Response $response, array $args): ResponseInterface {
        $post = $request->getParsedBody();

        if ($post['id'] != '' && $post['tagId'] != '') {
            $this->todosModel->removeTag($post['id'], $post['tagId']);
        }

        return $response->withHeader('Location', '/');
    }
}