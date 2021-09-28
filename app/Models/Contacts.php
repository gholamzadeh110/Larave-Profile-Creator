<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $fillable = [ 'title','link', 'avatar','profile_id'];
    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
}
