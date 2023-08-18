<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentStoreRequest;
use App\Repositories\Interface\CommentRepositoryInterface;

class CommentStoreController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    private $commentRepo;

    public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function __invoke(CommentStoreRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::user()->id;
        $validated['post_id'] = $request->post_id;

        $this->commentRepo->store($validated);
    }
}
