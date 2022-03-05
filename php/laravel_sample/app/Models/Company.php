<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_kana',
        'post_code',
        'prefecture',
        'address',
        'tel',
        'representative_first_name',
        'representative_last_name',
        'representative_first_name_kana',
        'representative_last_name_kana',
    ];
}
