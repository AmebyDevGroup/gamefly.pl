@extends('layouts.app')

@section('content')
    <div class="card text-white bg-dark mb-3">
        <div class="card-header">
            <h5 class="card-title">Lista gier</h5>
        </div>
        <div class="card-body">

            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
        </div>
        {{ $categories->links('backend.pagination') }}
    </div>
@endsection

