@extends('layoutmodule::admin.main')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('layoutmodule.name') !!}
    </p>
@endsection
