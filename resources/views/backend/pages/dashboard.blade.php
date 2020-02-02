@extends('backend.layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('isSuperAdmin'))
                                <h1> You are logged in ! ... SuperMan ! 🦸‍♂️</h1>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('isAdmin'))
                                <h1> You are logged in ! ... Boss ! 🤵</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
