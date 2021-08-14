<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'person';
    protected $fillable = ['firstname', 'lastname','firstparent_id','secondparent_id'];
}
