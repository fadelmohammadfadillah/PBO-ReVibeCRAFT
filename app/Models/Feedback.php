<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $fillable = [
        'user_id',
        'nama_pengguna',
        'rating',
        'alasan',
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
