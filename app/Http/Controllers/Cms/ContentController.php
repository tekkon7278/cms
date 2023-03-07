<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function update($siteId, $pageId, $contentId, Request $request)
    {
        $content = $request->content;
        $pageService = app()->make('PageService');
        $result = $pageService->updateContent($contentId, $content);
        return [
            'result' => $result
        ];
    }

    public function create($siteId, $pageId, Request $request)
    {
        $content = $request->content;
        $beforeContentId = $request->beforeContentId;
        
        $pageService = app()->make('PageService');
        $result = $pageService->createContent($pageId, $content, $beforeContentId);
        return [
            'result' => $result
        ];
    }
}
