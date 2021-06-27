@extends('layout')

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md links">
                @guest()
                    <a href="/login">Login</a>
                @else
                    <a href="/home?tab=form">Form</a>
                @endguest
            </div>

            <div class="links">

            </div>
        </div>
    </div>
@endsection