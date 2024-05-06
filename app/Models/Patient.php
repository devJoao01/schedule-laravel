<?php

namespace App\Models;
use App\Models\Appointment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_name', 'dt_nas'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
