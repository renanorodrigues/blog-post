<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function enum_profiles()
    {
        return [
                'Admin' => 1,
                'Author' => 2,
                'Subscriber' => 3,
                'Support' => 4
               ]; 
    }
}
