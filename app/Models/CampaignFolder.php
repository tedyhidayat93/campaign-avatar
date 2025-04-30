<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class CampaignFolder extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'campaign_folders';

    protected $fillable = [
        'name',    // stored as string (name)
        'description'
    ];
}