<?php

namespace App\Repositories\Implementation;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepositoryAbstract;
use App\Repositories\Interface\CommentRepositoryInterface;

class CommentRepositoryImpl extends BaseRepositoryAbstract implements CommentRepositoryInterface
{
    /**
     * @var $model
     */
    protected $model;

    /**
     * @var $post
     */
    protected $post;


    public function __construct(Comment $model, Post $post)
    {
        parent::__construct($model);

        $this->post = $post;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function store(array $attrs) : Model
    {        
        return $this->model->create($attrs);
    }
}