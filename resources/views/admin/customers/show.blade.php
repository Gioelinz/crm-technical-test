@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.customers.index') }}" class="btn btn-primary mb-3"><i class="fa-solid fa-arrow-left"></i>
            Torna
            indietro</a>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cliente: <span class="font-weight-bold">{{ $customer->name }}</span>
                        </h4>
                        <hr>
                        <p class="card-text">
                        <h5>Contatti</h5>
                        <ul class="list-unstyled h5">
                            <li><i class="fa-solid fa-envelope"></i> {{ $customer->email }}</li>
                            <li class="my-2"><i class="fa-solid fa-phone"></i> {{ $customer->telephone }}</li>
                            <li title="VAT/P.IVA"><i class="fa-solid fa-note-sticky"></i> {{ $customer->vat }}</li>
                        </ul>
                        </p>
                        <hr>
                        <p class="card-text">
                            <span class="h5">Note/Status</span>
                            @forelse($customer->tags as $tag)
                                <h4><span class="badge badge-{{ $tag->color }}">{{ $tag->label }}</span></h4>
                            @empty
                                <h5><span class="badge badge-secondary">Nessuna</span></h5>
                            @endforelse

                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between"> <span class="h4 mb-0">Offerte</span>
                            <a href="" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i></a>
                        </h5>
                        <div class="card-text mt-3">
                            @forelse($customer->offers as $offer)
                            @empty
                                <h5 class="mb-0">Non ci sono offerte</h5>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
