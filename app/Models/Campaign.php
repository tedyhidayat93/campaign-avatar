<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Campaign extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'campaigns';

    protected $fillable = [
        'campaign_folder_id',
        'name',
        'overview',
        'context',
        'objective',
        'key_message',
        'sentiment',
        'account_id',
    ];
}