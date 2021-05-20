<?php

namespace App\Controllers;

use App\Models\TagsModel;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AddTagController {
    private $tagsModel;

    public function __construct(TagsModel $tagsModel) {
        $this->tagsModel = $tagsModel;
    }

    public function __invoke(Request $request, Response $response, array $args): ResponseInterface {
        $post = $request->getParsedBody();

        if ($post['tag'] != '') {
            $this->tagsModel->addTag($post['tag']);
        }

        return $response->withHeader('Location', '/');
    }
}