<?php

namespace App\Models;

use App\Http\Controllers\ProfileController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;
    protected $fillable = [ 'skill','percent', 'state','avatar','profile_id'];
    public function profile()
    {
      return $this->belongsTo(Profile::class,'profile_id');
    }
}
