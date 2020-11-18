<?php

namespace App\Repositories\Interfaces;

interface ITeamRepository
{
    public function getPaginated($limit);
    public function getBySlug($slug);
    public function updateBySlug($slug, array $attributes);
    public function syncPlayers($teamSlug, array $players);
    public function storeAndAttachPlayers(array $attributesRequest);
}