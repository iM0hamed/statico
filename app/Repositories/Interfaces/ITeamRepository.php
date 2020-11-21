<?php

namespace App\Repositories\Interfaces;

interface ITeamRepository
{
    public function getPaginated($limit);
    public function getBySlug($slug);
    public function updateBySlug($slug, array $attributes);
    public function syncPlayers($teamSlug, array $players);
    public function store(array $attributes);
    public function uploadLogo($team, $image);
    public function updateLogo($team, $image);
}