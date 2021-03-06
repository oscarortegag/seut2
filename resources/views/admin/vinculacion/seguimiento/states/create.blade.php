@extends('layouts.master')

@section('header')
    <h1>Catalogo de estados de la república</h1>
@stop

@section('content')
    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Nuevo estado de la república</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('states.store') }}">
                            @csrf
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="form-group">
                                <label for="name" class="col-form-label text-md-right">Nombre</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a href="{{ route('states.index') }}" class="btn btn-default">Regresar</a>
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
