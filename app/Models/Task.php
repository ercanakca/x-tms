<?php

namespace App\Models;

use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'status', 'user_id'];

    protected $casts = [
        'status' => TaskStatus::class,
    ];

    /**
     * Görev bir kullanıcıya ait olabilir.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
