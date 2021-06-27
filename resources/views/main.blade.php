@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
{{--                <div class="panel-heading">Dashboard</div>--}}

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <ul class="nav nav-tabs">
                            <li class="{{ request('tab') === 'form' ? 'active' : '' }}"><a href="/home?tab=form">Form</a></li>
                            <li class="{{ request('tab') === 'results' ? 'active' : '' }}"><a href="/home?tab=results">Results</a></li>

                            @if(\Illuminate\Support\Facades\Auth::user()['super'] === 1)
                                <li class="{{ request('tab') === 'super' ? 'active' : '' }}"><a href="/home?tab=super">All Results</a></li>
                            @endif
                        </ul>

                        <div class="tab-content">
                            @switch(request('tab'))
                                @case('form')
                                    @include('form')
                                @break

                                @case('results')
                                    @include('results')
                                @break

                                @case('super')
                                    @include('super')
                                @break

                                @default
                                Something went wrong
                            @endswitch
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
