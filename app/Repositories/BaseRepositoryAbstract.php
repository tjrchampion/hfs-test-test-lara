<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interface\RepositoryInterface;


abstract class BaseRepositoryAbstract implements RepositoryInterface
{

    /**
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attr
     * @return Model
     */
    public function create(array $attrs) : Model
    {
        return $this->model->create($attrs);
    }

    /**
     * Get everything from Model
     *
     * @return Collection
     */
    public function get() : Collection
    {
        return $this->model->get();
    }

    /**
     * Return a paginated collection for any Model.
     *
     * @param Request $request
     * @param integer $pages
     * @param string $searchColumn
     * @return LengthAwarePaginator
     */
    public function paginated(Request $request, int $pages, string $searchColumn) : LengthAwarePaginator
    {   
        return $this->model->when($request->search, function ($query, $search) use ($searchColumn) {
            return $query->where($searchColumn,  'LIKE', "%{$search}%");
        })->with('user')->latest()->paginate($pages);
    }
    /**
     * findWhereFirst
     *
     * @param Request $request
     * @return Collection
     */
    public function findWhereFirst(array $parameters, array $with = []) : Model|Null
    {
        return $this->model->where($parameters)->with($with)->first();
    }
    

}   