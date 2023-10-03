<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $primarykey = 'id';
    public $incrementing = true;
    protected $keytype = 'int';
   

    protected $fillable = [
        'user_id',
        'post_id'
    ];
}
