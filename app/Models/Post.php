<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'slug',
        'email_sent'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}