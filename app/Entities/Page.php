<?php

namespace App\Entities;

class Page extends AbstractEntity
{
    protected $propertyKeyMap =[
        'id' => 'page_id',
        'title' => 'page_title',
        'contents' => '',
    ];
}
