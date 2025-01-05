<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function ticketDetail()
    {
        return $this->hasMany(TicketDetail::class);
    }

    public function detail()
    {
        return $this->hasOne(TicketDetail::class);
    }


    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<p class="badge bg-secondary">Unpaid</p>';
        }

        return '<p class="badge bg-success">Paid</p>';
    }
}
