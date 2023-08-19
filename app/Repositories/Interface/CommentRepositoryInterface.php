<?php

namespace App\Repositories\Interface;

use Illuminate\Database\Eloquent\Model;

interface CommentRepositoryInterface
{
    public function store(array $attrs) : Model;
}