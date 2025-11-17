<?php
namespace MonApp\Controllers;

use MonApp\Models\User;
use MonApp\Services\EmailService;

class UserController
{
    public function __construct()
    {
    }

    public function register(string $name, string $email): string
    {
        $user = new User($name);
        $service = new EmailService();
        $service->sendWelcome($email, $user->getName());
        return "User " . $user->getName() . " registered!";
    }
}