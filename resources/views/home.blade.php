@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Homepage User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome to User Dashboard! <br/>
                    @auth('backoffice')
                        You are logged in as Admin too, you can go to <a href="{{route('backoffice.dashboard')}}">admin dashboard</a>!
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
