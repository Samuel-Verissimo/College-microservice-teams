<?php

// Importando funções 
require_once('models/Coach.php');
require_once('models/Team.php');

// Define as rotas suportadas pela API
$data = json_decode(file_get_contents('php://input'), true);
$routes = [
  '/api/coach' => [
    'GET' => 'Coach::getAll',
    'POST' => 'Coach::addCoach',
    'PUT' => 'Coach::updateCoach',
    'DELETE' => 'Coach::deleteCoach'
  ],
  '/api/team' => [
    'GET' => 'Team::getAll',
    'POST' => 'Team::addTeam',
    'PUT' => 'Team::updateTeam',
    'DELETE' => 'Team::deleteTeam'
  ]
];

// Obtém a rota e o método HTTP da solicitação
$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// echo "<br>rota: " . $route; 
// echo "<br>method: " . $method;

// Verifica se a rota e o método HTTP são suportados
if (!isset($routes[$route]) || !isset($routes[$route][$method])) {
    http_response_code(404);
    exit();
}

// Chama a função correspondente com base na rota e no método HTTP da solicitação
$functionName = $routes[$route][$method];
$result = call_user_func($functionName, $data);
echo json_encode($result);
?>