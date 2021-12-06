<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

abstract class BaseModel extends Model
{
  public static function boot()
  {
    parent::boot();
    static::deleting(function ($user) {
      if ($user->hasColumn('deleted_by')) {
        $user->deleted_by = Auth::id();
        $user->save();
      }
    });
    static::creating(function ($user) {
      if ($user->hasColumn('created_by')) {
        $user->created_by = Auth::id();
      }
    });
    static::updating(function ($user) {
      if ($user->hasColumn('updated_by')) {
        $user->updated_by = Auth::id();
      }
    });
  }
}
