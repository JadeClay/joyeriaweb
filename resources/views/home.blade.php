@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/landing-page.css') }}" />

@endpush

@section('content')    
    <div class="landing-text">
        <p>Joyerias Brador</p>
        <!-- IF THE USER IS AUTH, IT WILL DISPLAY ITS NAME, IF NOT, IT WILL PROMPT INVITADO AS DEFAULT MESSAGE -->
        <p class="subtext">Bienvenido, @auth {{ Auth::user()->name }}. @endauth @guest Invitado. @endguest</p>
    </div>
@endsection


