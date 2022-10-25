<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name',
        'dob',
        'phone',
        'email',
        'address'
    ];
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
