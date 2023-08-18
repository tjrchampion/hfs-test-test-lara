<?php

namespace App\Repositories\Implementation;

use App\Models\Post;
use App\Repositories\BaseRepositoryAbstract;
use App\Repositories\Interface\PostRepositoryInterface;

class PostRepositoryImpl extends BaseRepositoryAbstract implements PostRepositoryInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function store(array $attrs)
    {
        return $this->model->create($attrs);
    }
}