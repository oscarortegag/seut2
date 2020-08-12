@extends('layouts.master')

@section('header')
    <h1>Catálogo</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><h3>Modificar cuatrimestre</h3></div><br>
                    <div class="card-body ">
                            <form name="frmgro" method="post" action="{{ route('quarters.update', [$quarter->quarter_id]) }}">
                                {!! method_field('PUT') !!}
                                {!! csrf_field() !!}
                                @if (count($errors)>0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                        <ul>
                                            {{Session::get('flash_message')}}
                                        </ul>
                                    </div>
                                @endif
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="number" class="col-form-label text-md-right">Número ordinario</label>
                                    <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number"
                                    value="{{ $quarter->number }}" required autocomplete=number" placeholder="Ejemplo: 1" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="quarterName" class="col-form-label text-md-right">Cuatrimestre</label>
                                    <input id="quarterName" type="text" class="form-control @error('quarterName') is-invalid @enderror" name="quarterName"
                                    value="{{ $quarter->quarterName }}" required autocomplete="quarterName" placeholder="Ejemplo: Primer cuatrimestre" autofocus>
                                </div>
                            </div>                                                            
                                <div class="row">      
                                    <div class="form-group mb-0">
                                        <center>
                                            <div class="form-group col-xs-8">
                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('quarters.index') }}" class="btn btn-default">Cancelar</a>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
