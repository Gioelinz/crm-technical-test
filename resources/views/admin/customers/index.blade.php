@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @forelse ($customers as $customer)
                <div class="col-6">
                    <div class="card border-secondary mb-3">
                        <div class="card-header d-flex justify-content-between">
                            <span>
                                Cliente: <span class="font-weight-bold">{{ $customer->name }}</span>
                            </span>
                            <a title="{{ $customer->email }}" class="btn btn-sm btn-secondary text-right"
                                href="mailto:{{ $customer->email }}">Contatta
                            </a>
                        </div>
                        <div class="card-body text-secondary">
                            <p class="card-text"><i class="fa-solid fa-phone"></i> {{ $customer->telephone }}</p>
                            <p class="card-text"><i class="fa-solid fa-note-sticky"></i> VAT/P.IVA:
                                {{ $customer->vat }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <h1>Non ci sono clienti da visualizzare</h1>
            @endforelse
        </div>
    </div>
@endsection
