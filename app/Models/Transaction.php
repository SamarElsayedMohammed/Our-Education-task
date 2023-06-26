<?php

namespace App\Models;

use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpParser\Node\Stmt\Break_;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        "paid_amount",
        "currency",
        "parent_email",
        "status_code",
        "payment_date",
        "parent_identification",
    ];

    public $timestamps = false;

    public static function rules($id = Null)
    {
        return [
            'paidAmount' => ['required', 'max:14'],
            'Currency' => ['required', 'string', 'min:3'],
            'parentEmail' => [
                'required',
                'email',
                'exists:users,email',
            ],
            'statusCode' => ['required', 'in:1,2,3'],
            'paymentDate' => ['required', 'date'],


        ];

    }
    public function user()
    {
        return $this->belongsTo(User::class, 'parent_email', 'email')->withDefault();
    }

    public function statusCode(): Attribute
    {
        return Attribute::get(function ($value) {
            if ($value == 1) {
                return "authorized";
            } elseif ($value == 2) {
                return "decline";
            } else {
                return "refunded";
            }
        });

    }
}