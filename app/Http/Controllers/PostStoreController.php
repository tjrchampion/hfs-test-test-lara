<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Str;
use App\Repositories\Interface\PostRepositoryInterface;

class PostStoreController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepo;

    public function __construct(PostRepositoryInterface $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function __invoke(PostStoreRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = 1;
        $validated['slug'] =  Str::slug($request->title);
        $validated['email_sent'] = 0;

        $this->postRepo->store($validated);
    }
}
