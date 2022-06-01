@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cliente: {{ $customer->name }}</h5>
                        <p class="card-text">
                        <h5>Contatti</h5>
                        <ul class="list-unstyled">
                            <li>{{ $customer->email }}</li>
                            <li><i class="fa-solid fa-phone"></i> {{ $customer->telephone }}</li>
                            <li><i class="fa-solid fa-note-sticky"></i> {{ $customer->vat }}</li>
                        </ul>
                        </p>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Torna indietro</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mt-5">
                <h4>Offerte</h4>
            </div>
        </div>
    </div>
@endsection
