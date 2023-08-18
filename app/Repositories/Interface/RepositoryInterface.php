<?php

namespace App\Repositories\Interface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    /**
     * @param array $attr
     * @return Model
     */
    public function create(array $attrs) : Model;

    /**
     * @return Array
     */
    public function paginated(Request $request, int $pages, string $searchColumn) : LengthAwarePaginator;

    /**
     * @param Request $request
     * @return Array
     */
    public function get() : Collection;

    /**
     * @param Array $parameters
     * @param Array $with
     * @return Model
     */
    public function findWhereFirst(array $parameters, array $with = []) : Model|Null;
}