@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <label>Mostrar Empresa</label>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Código: </label> {{ $company->id }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Nome: </label> {{ $company->name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">CEP: </label> {{ $company->zipcode }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Endereço: </label> {{ $company->address }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Ativo: </label> {{ $company->active ? 'Sim' : 'Não' }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input class="btn btn-warning" type="button" id="bt_editar" name="bt_editar" value="Editar" @click="__edit()">
                            <input class="btn btn-secondary" type="button" id="bt_voltar" name="bt_voltar" value="Voltar" @click="__back()">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('admin._incs.company')
