<?php

namespace App\Controllers;

use App\Models\TagsModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DeleteTagController {
    private $tagsModel;

    public function __construct(TagsModel $tagsModel) {
        $this->tagsModel = $tagsModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response {
        $post = $request->getParsedBody();

        if ($post['id'] != '') {
            $this->tagsModel->deleteTag($post['id']);
        }

        return $response->withHeader('Location', '/tags');
    }
}