<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public $table = 'profile';
    protected $fillable = [ 'name','family', 'address','mobile','image','description','state'];

    public function contacts()
    {
        return $this->hasMany(Contacts::class, 'profile_id','id');
    }
    public function skills()
    {
        return $this->hasMany(Skills::class, 'profile_id','id');
    }
    public function projects()
    {
        return $this->hasMany(Projects::class, 'profile_id','id');
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class, 'profile_id','id');
    }
    public function educations()
    {
        return $this->hasMany(Education::class, 'profile_id','id');
    }
    public function interests()
    {
        return $this->hasMany(Interests::class, 'profile_id','id');
    }
    public function awards()
    {
        return $this->hasMany(Awards::class, 'profile_id','id');
    }
    public function donates()
    {
        return $this->hasMany(Donate::class, 'profile_id','id');
    }
    public function workflows()
    {
        return $this->hasMany(workflow::class, 'profile_id','id');
    }
    public function setting()
    {
        return $this->hasMany(setting::class, 'profile_id','id');
    }
}
