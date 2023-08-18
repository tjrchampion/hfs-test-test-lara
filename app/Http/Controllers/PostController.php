<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Repositories\Interface\PostRepositoryInterface;

class PostController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepo;

    public function __construct(PostRepositoryInterface $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function __invoke()
    {
        return Inertia::render('Posts/Index', [
            'posts' => $this->postRepo->get(),
        ]);
    }

    public function index()
    {
        return 'bla';
    }
}
