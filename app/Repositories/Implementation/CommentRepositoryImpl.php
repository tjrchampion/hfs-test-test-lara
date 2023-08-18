<?php

namespace App\Repositories\Implementation;

use App\Models\Comment;
use App\Repositories\BaseRepositoryAbstract;
use App\Repositories\Interface\CommentRepositoryInterface;

class CommentRepositoryImpl extends BaseRepositoryAbstract implements CommentRepositoryInterface
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }
}