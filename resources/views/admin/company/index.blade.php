@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex d-flex justify-content-between">
                    <span class="">Listagem de Empresas</span>
                    <span class=""><a href="{{ route('company.create') }}">Nova Empresa (+)</a></span>
                </div>
                <div class="card-body">
                    @foreach($companies as $key => $value)
                    <div class="row">
                        <div class="col-md-9">
                            <a href="{{ route('company.show', $value->id) }}">{{ $value->name . " | " . $value->address }}</a>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('company.edit', $value->id) }}">Editar</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('company.destroy', $value->id) }}">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
