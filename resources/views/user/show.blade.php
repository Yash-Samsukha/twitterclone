@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('share.left-sidebar')
            <div class="col-6">
                @include('share.success')
                <div class="mt-3">
                    @include('share.user-card')
                </div>
                <hr>
                @forelse($ideas as $idea)

                    @include('share.idea-card')
                @empty
                    <p class="text-center mt-4">No Result Found.</p>
                @endforelse
                <div class="mt-3">
                    {{$ideas->withQueryString()->links()}}
                </div>
            </div>
            <div class="col-3">
                @include('share.search-box')
                @include('share.follow-box')
            </div>
        </div>
@endsection
