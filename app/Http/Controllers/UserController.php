<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interface\UserRepositoryInterface;

class UserController extends Controller
{
    /**
     * Undocumented variable
     *
     * @var UserRepositoryInterface
     */
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }
}
