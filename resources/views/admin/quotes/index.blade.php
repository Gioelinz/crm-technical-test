@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.session-message')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Richieste preventivi ricevute <span
                                class="badge badge-primary">{{ count($quotes) }}</span>
                        </h3>
                        <div class="card-text mt-3">
                            <hr>
                            @forelse ($quotes as $quote)
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">
                                        <a class="text-dark" data-toggle="collapse"
                                            href="#collapseQuote-{{ $quote->id }}" role="button" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            {{ $quote->email }} <i class="fa-solid fa-caret-down"></i>
                                        </a>
                                    </h5>
                                    <div class="controls">
                                        <a title="{{ $quote->email }}" class="btn btn-sm btn-secondary"
                                            href="mailto:{{ $quote->email }}">
                                            <i class="fa-solid fa-envelope fa-lg"></i>
                                        </a>

                                        {{-- Passo email nel form di creazione --}}
                                        <a title="Nuovo cliente" class="btn btn-sm btn-success"
                                            href="{{ action('Admin\CustomerController@create', ['email' => $quote->email]) }}"><i
                                                class="fa-solid fa-plus fa-lg"></i></a>

                                        <form class="d-inline" action="{{ route('admin.quotes.destroy', $quote) }}"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button title="Elimina preventivo" type="submit"
                                                class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>

                                {{-- Menu collapse request --}}

                                <div class="collapse mt-3" id="collapseQuote-{{ $quote->id }}">
                                    <div class="card card-body h5">
                                        {{ $quote->request }}
                                    </div>
                                </div>

                                @if (!$loop->last)
                                    <hr>
                                @endif
                            @empty

                                <h5 class="mb-0">
                                    <a class="text-dark text-decoration-none" data-toggle="collapse" href="#collapseEmpty"
                                        role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Non ci sono preventivi <i class="fa-solid fa-caret-down"></i>
                                    </a>
                                </h5>

                                {{-- Menu collapse empty --}}

                                <div class="collapse mt-3" id="collapseEmpty">
                                    <div class="card card-body h5">
                                        Qui verranno mostrate le richieste di preventivo ricevute
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
