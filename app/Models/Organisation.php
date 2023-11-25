<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $encryptable = [
        'name',
    ];

    protected $searchable = [
        'name',
    ];

    protected $filterable = [
        'user_owner_id',
        'labels.id',
    ];

    public $sortable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function getSearchable()
    {
        return $this->searchable;
    }

    public function getTable()
    {
        return 'organisations';
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }

    /**
     * Get all of the organisation emails.
     */
    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    public function getPrimaryEmail()
    {
        return $this->emails()->where('primary', 1)->first();
    }

    /**
     * Get all of the organisation phone numbers.
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    public function getPrimaryPhone()
    {
        return $this->phones()->where('primary', 1)->first();
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function getPrimaryAddress()
    {
        return $this->addresses()->where('primary', 1)->first();
    }

    public function getBillingAddress()
    {
        return $this->addresses()->where('address_type_id', 5)->first();
    }

    public function getShippingAddress()
    {
        return $this->addresses()->where('address_type_id', 6)->first();
    }

    public function deals()
    {
        return $this->hasMany(\VentureDrake\LaravelCrm\Models\Deal::class);
    }

    /**
     * Get all of the labels for the lead.
     */
    public function labels()
    {
        return $this->morphToMany(\VentureDrake\LaravelCrm\Models\Label::class, config('laravel-crm.db_table_prefix').'labelable');
    }

    public function organisationType()
    {
        return $this->belongsTo(OrganisationType::class);
    }

    public function contacts()
    {
        return $this->morphMany(\VentureDrake\LaravelCrm\Models\Contact::class, 'contactable');
    }

    /**
     * Get the xero contact associated with the organisation.
     */
    public function xeroContact()
    {
        return $this->hasOne(\VentureDrake\LaravelCrm\Models\XeroContact::class);
    }

    public function client()
    {
        return $this->morphOne(\VentureDrake\LaravelCrm\Models\Client::class, 'clientable');
    }
}