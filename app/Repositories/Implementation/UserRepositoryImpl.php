<?php

namespace App\Repositories\Implementation;

use App\Models\User;
use App\Repositories\BaseRepositoryAbstract;
use App\Repositories\Interface\UserRepositoryInterface;

class UserRepositoryImpl extends BaseRepositoryAbstract implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}