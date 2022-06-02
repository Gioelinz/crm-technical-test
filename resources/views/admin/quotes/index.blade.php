@extends('layouts.app')

@section('content')
    <div class="container">
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
                            @empty

                                <h5 class="mb-0">
                                    <a class="text-dark text-decoration-none" data-toggle="collapse" href="#collapseExample"
                                        role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Non ci sono preventivi <i class="fa-solid fa-caret-down"></i>
                                    </a>
                                </h5>

                                {{-- Menu collapse --}}

                                <div class="collapse mt-3" id="collapseExample">
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
