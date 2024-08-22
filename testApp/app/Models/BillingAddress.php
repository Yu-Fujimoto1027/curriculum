<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BillingAddress extends Model
{

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    use HasFactory;

        /**
    * @var array
    */
    protected $fillable = ['company_id', 'name1', 'name1Kana', 'address', 'tel', 'depertment', 'name2', 'name2Kana']; 

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

}
