<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'specialty', 'work_schedule', 'contact'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function waitingList()
    {
        return $this->hasMany(WaitingList::class);
    }
}
