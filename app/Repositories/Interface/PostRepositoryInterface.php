<?php

namespace App\Repositories\Interface;

use Illuminate\Database\Eloquent\Model;

interface PostRepositoryInterface
{
    public function store(array $attrs);
}