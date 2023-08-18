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

    public function __invoke(Request $request)
    {
        return Inertia::render('Posts/Index', [
            'posts' => $this->postRepo->getPosts($request),
        ]);
    }

    public function viewPost(Request $request)
    {
        if($this->postRepo->getPost($request) === null) {
            return Inertia::render('Posts/NotFound', [
                'post' => [
                    'message' => 'Whoops, no blog post was found...',
                    'title' => $request->route('slug'),
                ]
            ]);
        }

        return Inertia::render('Posts/Post', [
            'post' => $this->postRepo->getPost($request),
        ]);
    }
}
