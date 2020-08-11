@extends('layouts.master')

@section('header')
    <h1>Nivel académico</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><h3> Actualizar datos del nivel académico</h3></div>

                    <div class="card-body ">
                        <form  method="post" action="{{ route('programs.update', [$programs->educativeProgram_id]) }}">
                            {!! method_field('PUT') !!}
                            {!! csrf_field() !!}
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="shortName" class="col-form-label text-md-right">Acrónimo</label>
                                    <input id="shortName" type="text" class="form-control @error('shortName') is-invalid @enderror" name="shortName"
                                    value="{{ $programs->shortName }}" required autocomplete="shortName" autofocus>
                                </div>                                                                   
                            </div>
                            <div class="row">                                                          
                                <div class="form-group col-xs-12">
                                    <label for="displayName" class="col-form-label text-md-right">Nombre</label>
                                    <input id="displayName" type="text" class="form-control @error('displayName') is-invalid @enderror" name="displayName" 
                                    value="{{ $programs->displayName }}" required autocomplete="displayName" autofocus>
                                </div>                 
                            </div>                                                            
                            <div class="row">      
                                <div class="form-group mb-0">
                                    <center>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Guardar
                                            </button>
                                            <a href="{{ route('programs.index') }}" class="btn btn-default">Cancelar</a>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



