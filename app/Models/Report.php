<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'report';
    protected $fillable = [
        'tutorial_id',
        'judul_tutorial',
        'deskripsi',
    ];

    public function tutorial(){
        /**
         * Belong to User
         *
         * @return Collection
         *
         **/
        return $this->belongsTo(Tutorial::class);
    }

}
