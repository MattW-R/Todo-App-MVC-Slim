<?php

namespace App\Controllers;

use App\Models\TagsModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class ViewAllTagsController {
    private $tagsModel;
    private $renderer;

    public function __construct(TagsModel $tagsModel, PhpRenderer $renderer) {
        $this->tagsModel = $tagsModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args): Response {
        $args['tags'] = $this->tagsModel->getAllTags();
        $args['request'] = $request;
        return $this->renderer->render($response, "tagsView.phtml", $args);
    }
}