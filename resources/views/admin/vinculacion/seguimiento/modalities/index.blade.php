@extends('layouts.master')

@section('header')
    <h1>Catálogo</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Listado de modalidad</h3>
                        <a href="{{route('modalities.create')}}" class="btn btn-success">
                            <i class="fa fa-plus"></i>
                            Nueva modalidad
                        </a>
                    </div><br><br>
                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-parentescos" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th >#</th>
                                    <th >Nombre</th>
                                    <th >Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($modality as $items)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $items->modalityName}}</td>
                                        <td>
                                            <a href="{{ route('modalities.edit',['id'=>$items->modality_id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar modalidad"></i></a>
                                            <form style="display: inline" method="POST" action="{{ route('modalities.destroy',['id'=>$items->modality_id]) }}">
                                                {!! method_field('DELETE') !!}
                                                {!! csrf_field() !!}
                                                <button type = "submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar modalidad"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td >
                                            <p> No existen modalidades </p>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="float-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('styles')
    <link rel="stylesheet" href="/adminlte/datatables.net-bs/css/dataTables.bootstrap.css">
@endpush

@push('scripts')
    <script src="/adminlte/datatables.net/js/jquery.dataTables.js"></script>
    <script src="/adminlte/datatables.net-bs/js/dataTables.bootstrap.js"></script>
    <script src="/js/admin/vinculacion/seguimiento/kinships/index.js"></script>
@endpush

