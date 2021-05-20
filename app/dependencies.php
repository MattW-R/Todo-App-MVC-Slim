<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['db'] = function(): \PDO {
        return new \PDO('mysql:host=127.0.0.1; dbname=todos', 'root', 'password');
    };

    $container['TodosModel'] = DI\factory('App\Factories\TodosModelFactory');
    $container['TagsModel'] = DI\factory('App\Factories\TagsModelFactory');

    $container['ViewMainPageController'] = DI\factory('App\Factories\ViewMainPageControllerFactory');
    $container['ViewAllTodosController'] = DI\factory('App\Factories\ViewAllTodosControllerFactory');
    $container['AddTodoController'] = DI\factory('App\Factories\AddTodoControllerFactory');
    $container['EditTodoController'] = DI\factory('App\Factories\EditTodoControllerFactory');
    $container['EditDoneTodoController'] = DI\factory('App\Factories\EditDoneTodoControllerFactory');
    $container['TodoAddTagController'] = DI\factory('App\Factories\TodoAddTagControllerFactory');
    $container['TodoRemoveTagController'] = DI\factory('App\Factories\TodoRemoveTagControllerFactory');
    $container['DeleteTodoController'] = DI\factory('App\Factories\DeleteTodoControllerFactory');
    $container['ViewAllTagsController'] = DI\factory('App\Factories\ViewAllTagsControllerFactory');
    $container['AddTagController'] = DI\factory('App\Factories\AddTagControllerFactory');
    $container['EditTagController'] = DI\factory('App\Factories\EditTagControllerFactory');
    $container['DeleteTagController'] = DI\factory('App\Factories\DeleteTagControllerFactory');

    $containerBuilder->addDefinitions($container);
};
