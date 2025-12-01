<?php

namespace Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'dales';

    protected $fillable = [
        'name',
        'email',
    ];
}
