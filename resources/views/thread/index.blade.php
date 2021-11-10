@extends('layouts.app')

@section('topside')
@include('layouts.partials.categories')
@endsection

@section('content')

@include('layouts.partials.thread-list')

@endsection

@section('heading')
<h2 class="mb-7 text-4xl font-heading">Forum</h2>
@endsection

