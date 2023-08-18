<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
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

}