<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = [ 'title','description','image','avatar','profile_id'];
    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
}
