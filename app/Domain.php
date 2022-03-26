<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domain extends Model
{
    // use HasFactory;

    protected $fillable = [
        'nama_domain',
    ];

    public function user(){
        return  $this->belongsTo(User::class);
    }
}
