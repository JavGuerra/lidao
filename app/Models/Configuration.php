<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'value',
    ];

    /**
     * La clave primaria asociada con la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'key';

    /**
     * Indica si el ID del modelo es autoincrementable.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * El tipo de dato del ID autoincrementable.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indica si se guardarán created_at y updated_at.
     *
     * @var bool
     */
    public $timestamps = false;
}
