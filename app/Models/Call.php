<?php

namespace App\Models;

use App\Traits\HasCrmActivities;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;

    use HasCrmActivities;
    protected $guarded = ['id'];

    protected $casts = [
        'start_at' => 'datetime',
        'finish_at' => 'datetime',
    ];

    protected $searchable = [
        'name',
        'description',
        'location'
    ];

    public function getSearchable()
    {
        return $this->searchable;
    }

    public function getTable()
    {
        return 'calls';
    }



    /**
     * Get all of the owning callable models.
     */
    public function callable()
    {
        return $this->morphTo('callable');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'user_updated_id');
    }

    public function deletedByUser()
    {
        return $this->belongsTo(User::class, 'user_deleted_id');
    }

    public function restoredByUser()
    {
        return $this->belongsTo(User::class, 'user_restored_id');
    }

    public function ownerUser()
    {
        return $this->belongsTo(User::class, 'user_owner_id');
    }

    public function assignedToUser()
    {
        return $this->belongsTo(User::class, 'user_assigned_id');
    }

    public function activity()
    {
        return $this->morphOne(Activity::class, 'recordable');
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
}
