<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property integer $menu_id
 * @property string $created_at
 * @property string $updated_at
 */
class Menu extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'link', 'menu_id', 'created_at', 'updated_at'];

}
