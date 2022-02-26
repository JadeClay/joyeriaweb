@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/landing-page.css') }}" />

@endpush

@section('content')    
    <div class="landing-text">
        <p>Joyerias Brador</p>
        <!-- IF THE USER IS AUTH, IT WILL DISPLAY ITS EMAIL. 
        IF USER IS NOT AUTHENTICATED, IT WILL PROMPT INVITADO AS DEFAULT MESSAGE -->
        <p class="subtext">Bienvenido, 
            @auth
                @if (!empty($employees->find(Auth::user()->employee_id)))
                    {{$employees->find(Auth::user()->employee_id)->name}}.
                @else
                    {{ Auth::user()->email }}.   
                @endif
            @endauth
            
            @guest Invitado. @endguest
        </p>
    </div>
@endsection


