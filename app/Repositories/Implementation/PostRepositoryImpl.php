<?php

namespace App\Repositories\Implementation;

use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepositoryAbstract;
use App\Repositories\Interface\PostRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostRepositoryImpl extends BaseRepositoryAbstract implements PostRepositoryInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }


    public function get() : AnonymousResourceCollection
    {
        return PostResource::collection($this->model->with('user')->latest()->get());
    }
    public function store(array $attrs) : Model
    {
        return $this->model->create($attrs);
    }
}