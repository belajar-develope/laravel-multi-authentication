@extends('backoffice.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Admin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome Admin to Your Dashboard <br/>
                    @auth('web')
                        You are logged in as User too, you can go to <a href="{{route('home')}}">admin dashboard</a>!
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
