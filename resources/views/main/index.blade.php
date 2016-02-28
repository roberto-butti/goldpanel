@extends('layouts.admin_template')

@section('content')
    <div class="container">
    Ciao {{ Auth::user()->name }}
    </div>
@endsection