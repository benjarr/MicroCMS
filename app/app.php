<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/../views',
));

// Register services.
$app['dao.article'] = $app->share(function ($app) {
	return new MicroCMS\DAO\ArticleDAO($app['db']);
});
$app['dao.comment'] = $app->share(function ($app) {
	$commentDAO = new MicroCMS\DAO\CommentDAO($app['db']);
	$commentDAO->setArticleDAO($app['dao.article']);
	return $commentDAO;
});