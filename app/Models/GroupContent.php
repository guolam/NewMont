<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupContent extends Model
{
    use HasFactory;
protected $table = 'group_contents';

    protected $fillable = [
        'user_id',
        'group_id',
        'tweet',
        'perfecture',
        'date',
        'mont',
        'description',
        'parking',
        'spring',
        'food',
        'image',
        'is_public',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    
    
}
