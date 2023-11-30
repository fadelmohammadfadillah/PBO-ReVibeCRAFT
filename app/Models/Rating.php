<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = [
        'user_id',
        'rating_id',
        'rating',
        'deskripsi',
    ];

    public function user(){
        /**
         * Belong to User
         *
         * @return Collection
         *
         **/
        return $this->belongsTo(User::class);
    }
}
