<?php

namespace App\Entities;

class Content extends AbstractEntity
{
    protected $propertyKeyMap =[
        'id' => 'site_id',
        'title' => 'content_title',
        'content' => 'content',
    ];
}
