<?php

namespace Tareque\Todo\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

}
