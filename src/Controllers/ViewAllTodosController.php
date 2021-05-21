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
        $get = $request->getQueryParams();
        $filterTags = explode(' ', $get['tags']);
        $filterTags = filter_var_array($filterTags, FILTER_SANITIZE_STRING);
        $args['todos'] = $this->todosModel->getAllTodos($filterTags);
        $args['tags'] = $this->tagsModel->getAllTags();
        return $this->renderer->render($response, "todosView.phtml", $args);
    }
}