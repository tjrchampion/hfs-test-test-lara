<?php

namespace App\Repositories\Implementation;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\ResourcePaginator;
use App\Repositories\BaseRepositoryAbstract;
use App\Repositories\Interface\PostRepositoryInterface;

class PostRepositoryImpl extends BaseRepositoryAbstract implements PostRepositoryInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    /**
     * All paginated posts
     *
     * @param Request $request
     * @return Array
     */
    public function getPosts(Request $request) : Array 
    {
        // Very helpful to get resources paginated: https://gist.github.com/Livijn/6754194d52775892d2a678d2814d98e6
        return response()->json(new ResourcePaginator(PostResource::collection(
            $this->paginated($request, 15, 'title')
        )))->getData(true);
    }
    
    /**
     * store a model
     *
     * @param array $attrs
     * @return Model
     */
    public function store(array $attrs) : Model
    {
        return $this->model->create($attrs);
    }

    public function getPost(Request $request) : PostResource|Null
    {
        if($this->findWhereFirst($request->route()->parameters) === null) {
            return $this->findWhereFirst($request->route()->parameters);
        }

        return new PostResource($this->findWhereFirst($request->route()->parameters, ['comments.user']));
    }
}