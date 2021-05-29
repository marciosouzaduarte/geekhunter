@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <label>Nova Empresa</label>
                </div>
                <div class="card-body">
                    <p v-if="errors.length">
                        <b>Por favor, corrija o(s) seguinte(s) erro(s):</b>
                        <ul>
                            <li v-for="error in errors">@{{ error }}</li>
                        </ul>
                    </p>
                    <form id="form0" action="{{ route("company.store") }}" method="POST" @submit="__checkForm">
                        <input type="hidden" name="_method" v-model="method" value="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="id">Código</label>
                                <input class="form-control" type="text" id="id" name="id" value="" readonly>
                            </div>
                            <div class="col-md-10">
                                <label for="name">Nome</label>
                                <input class="form-control" type="text" id="name" name="name" v-model="name" value="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="zipcode">CEP</label>
                                <input class="form-control" type="text" id="zipcode" name="zipcode" value="">
                            </div>
                            <div class="col-md-10">
                                <label for="address">Endereço</label>
                                <input class="form-control" type="text" id="address" name="address" v-model="address" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="active" name="active" value="">
                                    <label class="form-check-label" for="active">Ativo</label>
                                </div>
                            </div>
                            <div class="col-md-9 text-right">
                                <input class="btn btn-primary" type="submit" id="bt_submit" name="bt_submit" value="Salvar" @click="__store()">
                                <input class="btn btn-secondary" type="button" id="bt_voltar" name="bt_voltar" value="Voltar" @click="__back()">
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
