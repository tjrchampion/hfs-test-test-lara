<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostStoreRequest;
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

        $validated['user_id'] = Auth::user()->id;
        $validated['slug'] =  Str::slug($request->title);

        $this->postRepo->store($validated);
    }
}
