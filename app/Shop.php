<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shops';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany('app\Product');
    }


}
