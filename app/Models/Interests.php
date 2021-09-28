<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    use HasFactory;
    protected $fillable = [ 'description','profile_id'];
    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
}
