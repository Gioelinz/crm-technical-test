@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <a href="{{ route('admin.customers.index') }}" class="btn btn-primary mb-3"><i class="fa-solid fa-arrow-left"></i>
            Torna
            indietro</a>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title d-flex justify-content-between"> <span>Cliente:
                                <b>{{ $customer->name }}</b></span>
                            <div class="controls">
                                <a href="{{ route('admin.customers.edit', $customer) }}"
                                    class="btn btn-sm btn-warning mr-2"><i class="fa-solid fa-pencil"></i></a>
                                @include('includes.modal-confirm')
                            </div>
                        </h4>
                        <hr>
                        <p class="card-text">
                        <h5>Contatti</h5>
                        <ul class="list-unstyled h5">
                            <li><i class="fa-solid fa-envelope"></i> <a
                                    href="mailto:{{ $customer->email }}">{{ $customer->email }}</a>
                            </li>
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

            {{-- OFFERTE --}}

            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between"> <span class="h4 mb-0">Offerte</span>

                            {{-- Modale aggiunta offerte --}}

                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                data-target="#offermodal"><i class="fa-solid fa-plus"></i></button>

                            <div class="modal fade" id="offermodal" tabindex="-1" aria-labelledby="createOffer"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createOffer">Invia offerta</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.offers.store') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" value="{{ $customer->id }}" name="customer_id">
                                                <div class="form-group">
                                                    <label for="price" class="col-form-label">Prezzo</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i
                                                                    class="fa-solid fa-euro-sign"></i>
                                                            </div>
                                                        </div>
                                                        <input type="number" class="form-control" id="price" required
                                                            name="price" step="0.1">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="col-form-label">Descrizione
                                                        offerta</label>
                                                    <textarea class="form-control" id="description" rows="10" required name="description"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Annulla</button>
                                                <button type="submit" class="btn btn-outline-primary">Invia</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </h5>
                        <div class="card-text mt-3">
                            <hr>
                            @forelse($customer->offers as $offer)
                                <div class="d-flex justify-content-between align-items-center">

                                    {{-- Dropdown eliminazione --}}

                                    <div class="dropdown">
                                        <a href="#" class="h5 mb-0 text-dark text-decoration-none dropdown-toggle"
                                            role="button" id="dropdownMenuButton-{{ $offer->id }}"
                                            data-toggle="dropdown" aria-expanded="false"><i
                                                class="fa-solid fa-euro-sign"></i>
                                            {{ $offer->price }}
                                        </a>
                                        <div class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton-{{ $offer->id }}">

                                            <form action="{{ route('admin.offers.destroy', $offer) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="dropdown-item">Elimina offerta</button>
                                            </form>
                                        </div>
                                    </div>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#offer-{{ $offer->id }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="offer-{{ $offer->id }}" data-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Descrizione offerta</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body h4">
                                                {{ $offer->description }}
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                @if (!$loop->last)
                                    <hr>
                                @endif
                            @empty
                                <h5 class="mb-0">Non ci sono offerte</h5>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            {{-- FILES --}}

            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between">
                            <span class="h4 mb-0">Immagini/Documenti</span>
                            <form action="{{ route('admin.files.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $customer->id }}" name="customer_id">
                                <label for="file" title="Carica file" class="btn btn-sm btn-primary mb-0"><i
                                        class="fa-solid fa-cloud-arrow-up"></i></label>
                                <input class="d-none" type="file" name="file" id="file" onchange="form.submit()">
                            </form>
                        </h5>
                        <div class="card-text mt-3">
                            <hr>
                            <div class="d-flex flex-wrap">
                                @forelse($customer->files as $file)
                                    <div class="d-flex flex-column p-2">
                                        <a href="{{ asset('storage/' . $file->file) }}" target="_blank">
                                            @if (pathinfo($file->file, PATHINFO_EXTENSION) == 'pdf')
                                                <img src="https://icon-library.com/images/pdf-icon/pdf-icon-11.jpg"
                                                    alt="Allegato {{ $file->id }}" width="100" height="100">
                                            @else
                                                <img src="{{ asset('storage/' . $file->file) }}"
                                                    alt="Allegato {{ $file->id }}" width="100" height="100">
                                            @endif
                                        </a>
                                        <form action="{{ route('admin.files.destroy', $file) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger w-100"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                @empty
                                    <h5 class="mb-0">Non ci sono file caricati</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
