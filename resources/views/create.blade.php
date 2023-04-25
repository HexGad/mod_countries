@extends('dashboard.layouts.base')
@section('toolbar')
    @include('dashboard.layouts.components.toolbar',[
        'title' => 'Countries',
        'breadcrumbs' => [
            ['title'=> 'Home', 'url' => url('/dashboard/')],
            ['title'=> 'Countries', 'url' => route('dashboard.countries.index')],
            ['title'=> 'Create Countries'],
        ]
    ])
@endsection

@push('styles')
    {{ module_vite('countries', 'resources/assets/sass/app.scss') }}
@endpush


@section('content')
    <div id="app">
        <create />
    </div>
@endsection

@push('scripts')
    {{ module_vite('countries', 'resources/assets/js/app.js') }}
@endpush
