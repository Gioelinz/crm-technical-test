@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="d-flex justify-content-end mb-2">
            <a class="btn btn-success" href="{{ route('admin.customers.create') }}">Nuovo cliente</a>
        </div>
        <div class="row">
            @forelse ($customers as $customer)
                <div class="col-6 py-2">
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

                            @forelse($customer->tags as $tag)
                                <h5 @if ($loop->last) class="mb-0" @endif><span
                                        class="badge badge-{{ $tag->color }}">{{ $tag->label }}</span></h5>
                            @empty
                                <h5 class="mb-0"><span class="badge badge-secondary">Nessuna nota</span></h5>
                            @endforelse

                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div class="show">
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('admin.customers.show', $customer) }}">Mostra</a>
                            </div>
                            <div class="controls">
                                <a href="{{ route('admin.customers.edit', $customer) }}"
                                    class="btn btn-sm btn-warning mr-2"><i class="fa-solid fa-pencil"></i></a>
                                @include('includes.modal-confirm')
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h1>Non ci sono clienti da visualizzare</h1>
            @endforelse
        </div>
    </div>
@endsection
