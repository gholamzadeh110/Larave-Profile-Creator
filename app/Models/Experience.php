<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [ 'title','subtitle', 'description','start_date','end_date','profile_id'];
    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
}
