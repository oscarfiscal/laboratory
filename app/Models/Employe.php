<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $guarded=[];

    /* scope */

    public function scopeFirstname($query, $first_name)
    {
        if($first_name)
        {
            return $query->where('first_name', 'LIKE', "%$first_name%");
        }

    }

    public function scopeEmploye($query, $employe_id)
    {
        if($employe_id)
        {
            return $query->where('employe_id', 'LIKE', "%$employe_id%");
        }
    }

    public function scopeLastname($query, $last_name)
    {
        if($last_name)
        {
            return $query->where('last_name', 'LIKE', "%$last_name%");
        }

    }

    public function scopeDepartament($query, $departament)
    {
        if($departament)
        {
            return $query->where('departament', 'LIKE', "%$departament%");
        }
      
    }
}
