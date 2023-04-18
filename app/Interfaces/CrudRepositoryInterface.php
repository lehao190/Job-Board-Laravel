<?php

namespace App\Interfaces;

interface CrudRepositoryInterface {
    public function get($id);
    public function getAll();
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
