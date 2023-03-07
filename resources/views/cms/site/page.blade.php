@extends('cms.layout.base')

@section('title', $site->name())
@section('h1Title', $currentPage->title())

@section('main')

  <div class="menu">
    <ul>
    @foreach ($pages as $page)
      <li><a href="/cms/sites/{{$site->id()}}/pages/{{$page->id()}}">{{$page->title()}}</a></li>
    @endforeach
    </ul>
  </div>

  <Contents
    :page-id="{{ $currentPage->id() }}"
    :contents-prop="{{ $currentPage->contents() }}"
  >
  </contents>

@endsection