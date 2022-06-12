<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingSession extends Model
{
    protected $table = 'shopping_session';

    protected $fillable =['user_id', 'total'];
}
