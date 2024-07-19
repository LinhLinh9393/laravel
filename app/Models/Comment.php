<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tin_id',
        'user_id',
        'parent_id',
        'content'
    ];

    public function post()
    {
        return $this->belongsTo(Tin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Thiết lập mối quan hệ ngược lại để xác định comment cha
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}
