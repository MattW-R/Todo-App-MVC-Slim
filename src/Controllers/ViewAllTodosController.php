<?php

namespace App\Controllers;

use App\Models\TagsModel;
use App\Models\TodosModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class ViewAllTodosController {
    private $todosModel;
    private $tagsModel;
    private $renderer;

    public function __construct(TodosModel $todosModel, TagsModel $tagsModel, PhpRenderer $renderer) {
        $this->todosModel = $todosModel;
        $this->tagsModel = $tagsModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args): Response {
            $args['todos'] = $this->todosModel->getAllTodos();
            $args['tags'] = $this->tagsModel->getAllTags();
            return $this->renderer->render($response, "todosView.phtml", $args);
    }
}