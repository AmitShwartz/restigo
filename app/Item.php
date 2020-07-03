<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'catalog_number';
    protected $table= 'items';
    protected $fillable=[
        'name',
        'has_vat',
        'price',
        'diversity',
        'enable'
    ];

}
