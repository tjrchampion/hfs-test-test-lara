<?php

namespace App\Repositories\Interface;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface PostRepositoryInterface
{
    public function get() : AnonymousResourceCollection;
    public function store(array $attrs) : Model;
}