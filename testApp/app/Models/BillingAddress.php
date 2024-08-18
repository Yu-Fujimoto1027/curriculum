<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BillingAddress extends Model
{
    use HasFactory;

        /**
    * @var array
    */
    protected $fillable = ['company_id', 'name1', 'name1Kana', 'address', 'tel', 'depertment', 'name2', 'name2Kana']; 

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public static function fromRequest(Request $request): self
    {
        return new self($request->only([
            'company_id',
            'name1',
            'name1Kana',
            'address',
            'tel',
            'depertment',
            'name2',
            'name2Kana'
        ]));
    }

}
