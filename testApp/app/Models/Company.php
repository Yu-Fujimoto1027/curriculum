<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Company extends Model
{

    public function billingAddresses()
    {
        return $this->hasMany(BillingAddress::class);
    }

    use HasFactory;

        /**
    * @var array
    */
    protected $fillable = ['name1', 'name1Kana', 'address', 'tel', 'name2', 'name2Kana']; 

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
}
