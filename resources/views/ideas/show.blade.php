@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('share.left-sidebar')
            <div class="col-6">
                @include('share.success')



                @include('share.idea-card')

            </div>
            <div class="col-3">
                @include('share.search-box')
                @include('share.follow-box')
            </div>
        </div>
@endsection
