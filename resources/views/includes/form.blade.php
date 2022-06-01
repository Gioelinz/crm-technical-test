@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        @if ($customer->exists)
            <h1>Modifica Cliente</h1>
            <form action="{{ route('admin.customers.update', $customer) }}" method="post">
                @method('PUT')
            @else
                <h1>Carica Cliente</h1>
                <form action="{{ route('admin.customers.store') }}" method="post">
        @endif


        @csrf
        <div class="form-group">
            <label for="name">Nome*</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $customer->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email*</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
                    </div>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        placeholder="email@example.com" value="{{ old('email', $customer->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="telephone">Telephone*</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa-solid fa-phone"></i></div>
                    </div>
                    <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                        name="telephone" pattern="[0-9]{3}-[0-9]{3}[0-9]{4}" placeholder="333-12345678" required
                        value="{{ old('telephone', $customer->telephone) }}">
                    @error('telephone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="vat">VAT/P.IVA</label>
            <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat" name="vat"
                placeholder="01234567891" value="{{ old('vat', $customer->vat) }}">

            @error('vat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-12">
                <div class="@error('tags') is-invalid @enderror">
                    <h4>Tipologia cliente</h4>
                    @foreach ($tags as $tag)
                        <div class="custom-control custom-switch d-inline-block mb-5 mt-4">
                            <input type="checkbox" class="custom-control-input" id="tag-input-{{ $tag->id }}"
                                value="{{ $tag->id }}" name="tags[]" @if (in_array($tag->id, old('tags', $current_tags ?? []))) checked @endif>
                            <label class="custom-control-label mr-5 h5" for="tag-input-{{ $tag->id }}"><span
                                    class="badge badge-{{ $tag->color }}">{{ $tag->label }}</span></label>
                        </div>
                    @endforeach
                </div>
                @error('tags')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success">Conferma</button>
        </form>
    </div>
@endsection
