<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //
    public function user() {
        return $this->belongsTo(User::class); //'App\User tarea pertenece a un usuario
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class); // Tarea pertenece a una categoria
    }
}
