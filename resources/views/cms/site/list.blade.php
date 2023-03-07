@extends('cms.layout.base')

@section('title', 'site_list')
@section('h1Title', 'site_list')

@section('main')
  <div class="contents">
    <ul>
    @foreach ($sites as $site)
      <li><a href="/cms/sites/{{ $site->id() }}">{{ $site->name() }}</a></li>
    @endforeach
    </ul>
  </div>
@endsection