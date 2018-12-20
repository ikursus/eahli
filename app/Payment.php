<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    # protected $table = 'pengguna';

    // Fillable (mass assignment records)
    protected $fillable = [
      'user_id',
      'amount',
      'due_date',
      'status'
    ];

    # Relationship payment -> user (ikut naming convention)
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    # Relationship payment -> user (tak ikut naming convention)
    public function getUser()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
