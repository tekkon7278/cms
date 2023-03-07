<?php

namespace App\Entities;

class Content extends AbstractEntity
{
    protected $propertyKeyMap =[
        'id' => 'content_id',
        'pageId' => 'page_id',
        'title' => 'content_title',
        'content' => 'content',
    ];
}
