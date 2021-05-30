@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form id="form0" action="{{ route("company.search") }}" method="GET">
                    <div class="card-header d-flex">
                        @csrf
                        <input type="text" id="search" name="search" placeholder="{{ __('search') }}">&nbsp;
                        <input class="btn btn-info" type="submit" id="bt_search" name="bt_search" value="Pesquisar">
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span class="">Listagem de Empresas</span>
                    <span class=""><a href="{{ route('company.create') }}">Nova Empresa (+)</a></span>
                </div>
                <div class="card-body">
                    @foreach($companies as $key => $value)
                    <div class="row">
                        <div class="col-md-9">
                            <a style="{{ !$value->active ? 'color: grey;' : '' }}" href="{{ route('company.show', $value->id) }}">{{ $value->name . " | " . $value->address }}</a>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('company.edit', $value->id) }}">Editar</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('company.delete', $value->id) }}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}');">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                {{ $companies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
