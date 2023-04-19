<?php

namespace App\Interfaces;

use App\Interfaces\CrudRepositoryInterface;

interface UserRepositoryInterface extends CrudRepositoryInterface {
    public function getByEmail($email);
    public function createEmployerUser($data);
}
