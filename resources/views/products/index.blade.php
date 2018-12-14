@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <pre></pre>
            <products :prods='@json($products)'></products>
        </div>
    </div>
</div>
@endsection
