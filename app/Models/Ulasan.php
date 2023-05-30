<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $guarded =[
        'id'
    ];
    public function pariwisata()
    {
        return $this->belongsTo(investor::class, 'pariwisata_id');
    }
}
