<?php
namespace MonApp\Services;

class EmailService
{
    public function sendWelcome(string $to, string $name): void
    {
        echo "Email de bienvenue envoyé à $to pour $name\n";
    }
}