<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

        /**
    * @var array
    */
    protected $fillable = ['title', 'content']; 

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
}
