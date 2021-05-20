<?php

namespace App;

class Notification
{
    public $errors = [];

    public function addError(string $fielName, string $message): void
    {
        $this->errors[$fielName] = $message;
    }
    public function notify(string $message): void
    {
        echo $message;
    }
    public function getError(): array
    {
        return $this->errors;
    }
}
