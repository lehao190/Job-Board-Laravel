<?php

namespace App\Interfaces;

interface CrudRepositoryInterface {
    public function get($id);
    public function getAll();
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
