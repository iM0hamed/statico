<?php

namespace App\Repositories\Interfaces;

interface ITeamRepository
{
    public function getPaginated($limit, array $with = null);
    public function getBySlug($slug, $with = null);
    public function updateBySlug($slug, array $attributes);
    public function syncPlayers($teamSlug, array $players);
    public function store(array $attributes);
}