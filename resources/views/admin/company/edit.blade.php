@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <label>Modificar Empresa</label>
                </div>
                <div class="card-body">
                    <p v-if="errors.length">
                        <b>Por favor, corrija o(s) seguinte(s) erro(s):</b>
                        <ul>
                            <li v-for="error in errors">@{{ error }}</li>
                        </ul>
                    </p>
                    <form id="form0" action="{{ route("company.update", $company->id) }}" method="POST" @submit="__checkForm">
                        <input type="hidden" name="_method" v-model="method">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="id">Código</label>
                                <input class="form-control" type="text" id="id" name="id" value="{{ $company->id }}" readonly>
                            </div>
                            <div class="col-md-10">
                                <label for="name">Nome</label>
                                <input class="form-control" type="text" id="name" name="name" v-model="name" value="{{ $company->name }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="zipcode">CEP</label>
                                <input class="form-control" type="text" id="zipcode" name="zipcode" value="{{ $company->zipcode }}">
                            </div>
                            <div class="col-md-10">
                                <label for="address">Endereço</label>
                                <input class="form-control" type="text" id="address" name="address" v-model="address" value="{{ $company->address }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-check-input" type="radio" id="active1" name="active" value="1" {{ $company->active == '1' ? 'checked' : '' }} v-model="active">
                                            <label class="form-check-label" for="active1">Ativo</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-check-input" type="radio" id="active2" name="active" value="0" {{ $company->active == '0' ? 'checked' : '' }} v-model="active">
                                            <label class="form-check-label" for="active2">Inativo</label>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 text-right">
                                <input class="btn btn-success" type="button" id="bt_create" name="bt_create" value="Novo" @click="__create()">
                                <input class="btn btn-primary" type="submit" id="bt_store" name="bt_store" value="Salvar" @click="__update()">
                                <input class="btn btn-danger" type="submit" id="bt_destroy" name="bt_destroy" value="Excluir" @click="__destroy()" onclick="return confirm('{{ __('Are you sure you want to delete?') }}');">
                                <input class="btn btn-secondary" type="button" id="bt_back" name="bt_back" value="Voltar" @click="__back()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('admin._incs.company')
