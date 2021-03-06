<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class ViewMainPageController {
    private $renderer;

    public function __construct(PhpRenderer $renderer) {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args): Response {
        $args['request'] = $request;
        return $this->renderer->render($response, "mainView.phtml", $args);
    }
}