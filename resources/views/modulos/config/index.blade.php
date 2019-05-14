@extends('layouts.app')

@section('content')
<div class="container">

@can('edit-d')
   EDITA AQUI
@else 
AQUI   
@endcan    
</div>
    @endsection    