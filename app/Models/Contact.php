<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Nustatome, kad leistų siųsti informaciją į duomenų bazę pagal duomenų bazės laukus (masyvas)
    public $fillable = ['name', 'email', 'phone', 'subject', 'message'];
}
