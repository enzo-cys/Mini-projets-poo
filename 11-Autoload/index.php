<?php
require 'vendor/autoload.php';

use MonApp\Models\User;
use MonApp\Controllers\UserController;

$user = new User('Jean');
echo "Nom utilisateur : " . $user->getName() . "\n";

$controller = new UserController();
echo $controller->register('Alice', 'alice@example.com') . "\n";