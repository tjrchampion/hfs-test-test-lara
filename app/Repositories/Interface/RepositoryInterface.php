<?php

namespace App\Repositories\Interface;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * @param array $attr
     * @return Model
     */
    public function create(array $attrs) : Model;
}