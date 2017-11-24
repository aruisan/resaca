<?php

namespace resaca;

use Illuminate\Database\Eloquent\Model;

class ReservaElementos extends Model
{
    protected $table = 'reservas_elementos';

    protected $inicio = ['hora_inicio'];
    protected $final = ['hora_final'];
}
