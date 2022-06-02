@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Benvenuto {{ auth()->user()->name }}
                        <div class="mt-2">
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-primary">I tuoi
                                clienti</a>
                            <a href="{{ route('admin.quotes.index') }}" class="btn btn-primary">
                                Preventivi <span class="badge badge-light">{{ $quotes_count }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
