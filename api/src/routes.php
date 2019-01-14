<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\UsersController;
use App\Controllers\CardsController;

// Routes
$app -> options ("/{routes:.+}", function ($request, $response, $args) {
	return $response;
});

$app -> add (function ($req, $res, $next) {
	$response = $next($req, $res);
	return $response
			-> withHeader ("Access-Control-Allow-Origin", "http://localhost:4200")
			-> withHeader ("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, Accept, Origin, Authorization")
			-> withHeader ("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, PATCH, OPTIONS");
});

$app -> post ("/login", function (Request $request, Response $response, array $args) {
	$controller = new UsersController();
	$params = $request -> getParams ();
	$result = $controller -> authenticate ($params);

	$response = $response -> withJson ($result);
	return $response;
});

$app -> get ("/users/[{id}]", function (Request $request, Response $response, array $args) {
	$controller = new UsersController();
	$result = $controller -> getUser ($args["id"]);

	$response = $response -> withJson ($result);
	return $response;
});

$app -> post ("/users", function (Request $request, Response $response, array $args) {
	$controller = new UsersController();
	$params = $request -> getParsedBody ();
	$result = $controller -> createUser ($params);

	$response = $response -> withJson ($result);
	return $response;
});

$app -> put ("/users/[{id}]", function (Request $request, Response $response, array $args) {
	$controller = new UsersController();
	$params = $request -> getParsedBody ();
	$result = $controller -> saveUser ($args["id"], $params);

	$response = $response -> withJson ($result);
	return $response;
});

$app -> delete ("/users/[{id}]", function (Request $request, Response $response, array $args) {
	$controller = new UsersController();
	$result = $controller -> removeUser ($args["id"]);

	$response = $response -> withJson ($result);
	return $response;
});

$app -> get ("/cards", function (Request $request, Response $response, array $args) {
	$controller = new CardsController();
	$params = $request -> getParams ();
	$result = $controller -> getCards ($params);

	$response = $response -> withJson ($result);
	return $response;
});

$app -> get ("/cards/[{id}]", function (Request $request, Response $response, array $args) {
	$controller = new CardsController();
	$result = $controller -> getCard ($args["id"]);

	$response = $response -> withJson ($result);
	return $response;
});

$app -> post ("/cards", function (Request $request, Response $response, array $args) {
	$controller = new CardsController();
	$params = $request -> getParsedBody ();
	$result = $controller -> createCard ($params);

	$response = $response -> withJson ($result);
	return $response;
});

$app -> put ("/cards/[{id}]", function (Request $request, Response $response, array $args) {
	$controller = new CardsController();
	$params = $request -> getParsedBody ();
	$result = $controller -> saveCard ($args["id"], $params);

	$response = $response -> withJson ($result);
	return $response;
});

$app -> delete ("/cards/[{id}]", function (Request $request, Response $response, array $args) {
	$controller = new CardsController();
	$result = $controller -> removeCard ($args["id"]);

	$response = $response -> withJson ($result);
	return $response;
});

$app  -> map (["GET", "POST", "PUT", "DELETE", "PATCH"], "/{routes:.+}", function($req, $res) {
	$handler = $this -> notFoundHandler;
	return $handler($req, $res);
});