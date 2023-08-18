<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'slug',
        'email_sent',
    ];

    public function user()
    {
        $this->hasOne(User::class, 'user_id', 'id');
    }
}
