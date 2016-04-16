<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//loading all classes
spl_autoload_register(function ($classname) {
    require ("../src/classes/" . $classname . ".php");
});

$app->get('/connectme', function (Request $request, Response $response) {
    
    $response = $this->view->render($response, "connectme.phtml");
    return $response;
})->setName('take_user_details');

$app->get('/user', function (Request $request, Response $response) {
	$this->logger->addInfo("User List");
    $mapper = new UserMapper($this->db);
    $users = $mapper->getUsers();
    
    $response = $this->view->render($response, "home.phtml", ["users" => $users, "router" => $this->router]);
    //$response->getBody()->write(var_export($users, true));
    
    
    return $response;
});

$app->get('/user-detail/{id}', function (Request $request, Response $response,$args) {
    $this->logger->addInfo("User");
    $user_id = (int)$args['id'];
    $mapper = new UserMapper($this->db);
    $user = $mapper->getUserById($user_id);
    
    //$response = $this->view->render($response, "home.phtml", ["users" => $users, "router" => $this->router]);
    $response->getBody()->write(var_export($user, true));
    
    
    return $response;
})->setName('user-detail');

$app->post('/savedetails', function (Request $request,Response $response) {
    $data = $request->getParsedBody();
    $user_data = [];
    $user_data['username'] = filter_var($data['username'], FILTER_SANITIZE_STRING);
    $user_data['age'] = filter_var($data['age'], FILTER_SANITIZE_STRING);
    $user_data['location'] = filter_var($data['location'], FILTER_SANITIZE_STRING);

    $user_details = new UserEntity($user_data);
    $user_mapper = new UserMapper($this->db);
    $user_mapper->save($user_details);

    $response->getBody()->write(var_export($user_data,true));
    return $response;
});
/*
$app->get('/connectme', function (Request $request, Response $response) {
   
    $response = $this->view->render($response, "connectme.phtml");
    return $response;
})->setName('take_user_details');*/







