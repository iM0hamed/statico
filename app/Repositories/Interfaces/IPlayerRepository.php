<?php

namespace App\Repositories\Interfaces;

interface IPlayerRepository 
{
    public function getPaginated($limit);
    public function getAvailableRosters($team);
    public function getFreeRosters();
    public function store(array $attributes);
}