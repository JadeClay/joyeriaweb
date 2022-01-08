@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/landing-page.css') }}" />

@endpush

@section('content')    
    <div class="landing-text">
        <p>Joyerias Brador</p>
        <!-- IF THE USER IS AUTH, IT WILL DISPLAY ITS NAME IF LINKED WITH AN EMPLOYEE OR ITS EMAIL IF NOT. 
        IF USER IS NOT AUTHENTICATED, IT WILL PROMPT INVITADO AS DEFAULT MESSAGE -->
        <p class="subtext">Bienvenido, 
            @if ($employees->find(Auth::user()) > 0)
                @auth
                    {{ $employees->find(Auth::user()->id)->name }}.
                @endauth
            @else
                @auth
                    {{ Auth::user()->email }}.
                @endauth     
                @guest Invitado. @endguest
            @endif
        </p>
    </div>
@endsection


