<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'name',
        'material_type_id',
        'price',
        'quantity',
        'min_quantity',
        'package_quantity',
        'unit_id'
        ];

    public function unit() : belongsTo
    {
        return $this->belongsTo(Unit::class);
    }
    public function materialType() : belongsTo{
        return $this->belongsTo(MaterialType::class);
    }
    public function productMaterial() : HasMany {
        return $this->hasMany(ProductMaterial::class);
    }

}
