<?php

namespace App\Repositories\Interfaces;

interface IBaseRepository
{
    public function getAll();
    public function getById($id);
    public function store(array $attributes);
    public function update($id, array $attributes);
    public function destroy($id);
}