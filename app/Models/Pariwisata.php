<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pariwisata extends Model
{
    use HasFactory;
    protected $guarded =[
        'id'
    ];
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }
}
