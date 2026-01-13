<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'best_deal' => 'boolean',
    ];

    public function propertyType(){
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function images(){
        return $this->hasMany(PropertyImage::class, 'property_id');
    }

    public function image(){
        return $this->hasOne(PropertyImage::class, 'property_id');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function listedBy() {
        return $this->belongsTo(User::class, 'listed_by');
    }
    public function agent()
    {
        return $this->belongsTo(User::class, 'listed_by');
    }

    public function interiors() { return $this->hasMany(PropertyInterior::class); }
    public function utilityInfrastructures() { return $this->hasMany(PropertyUtilityInfrastructure::class); }
    public function safetySecurities() { return $this->hasMany(PropertySafetySecurity::class); }

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }

    public function propertyTypes()
    {
        return $this->belongsToMany(
            \App\Models\PropertyType::class,
            'property_property_types',
            'property_id',
            'property_type_id'
        )->withTimestamps();
    }
}
