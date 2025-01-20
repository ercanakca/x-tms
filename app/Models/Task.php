<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'description', 'status', 'assigned_to', 'created_admin_id'
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_admin_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

}
