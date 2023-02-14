@extends('layout.base')

@section('title', $site->name())
@section('h1Title', $currentPage->title())

@section('contents')
  @foreach ($currentPage->contents() as $content)
    <div class="text">{{$content->content()}}</div>
  @endforeach
@endsection