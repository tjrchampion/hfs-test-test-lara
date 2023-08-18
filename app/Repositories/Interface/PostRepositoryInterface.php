<?php

namespace App\Repositories\Interface;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Database\Eloquent\Model;


interface PostRepositoryInterface
{
    public function getPost(Request $request) : PostResource|Null;
    public function getPosts(Request $request) : Array;
    public function store(array $attrs) : Model;
}