<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $connection = 'musinsa_db';
    protected $table = 'goods';
    public $timestamps = false;
}
