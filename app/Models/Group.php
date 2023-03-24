<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    
    use HasFactory;

  protected $guarded = [
    'id',
    'created_at',
    'updated_at',
  ];
  
  public static function getAllOrderByUpdated_at()
  {
    return self::orderBy('updated_at', 'desc')->get();
  }
  
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'group_members');
    }

    public function isOwner(User $user)
    {
        return $this->owner_id === $user->id;
    }

    public function isMember(User $user)
    {
        return $this->members->contains($user);
    }
    
    public function groupRequests()
    {
        return $this->hasMany(GroupRequest::class);
    }
}
