{{--トップページのビュー--}}
@extends('layouts.app')

@section('content')
    @include('top_partials.hero')

    @include('top_partials.features')

    @include('top_partials.step-introduction')

    @include('top_partials.recommend')

    <scrolltopbtn></scrolltopbtn>

@endsection
