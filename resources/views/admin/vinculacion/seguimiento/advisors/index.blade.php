@extends('layouts.master')

@section('header')
    <h1>Asesor académico</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Listado</h3>
                        <a href="{{route('advisors.create')}}" class="btn btn-success">
                            <i class="fa fa-plus"></i>&nbsp;Nuevo asesor académico
                        </a><br><br>
                    </div>
                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-parentescos" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Correo electrónico</th>
                                    <th>Télefono</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($advisor as $items)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $items->nameAcademicAdvisor}}</td>
                                        <td>{{ $items->academicPosition}}</td>
                                        <td>{{ $items->academicAdvisorEmail}}</td>
                                        <td>{{ $items->advisorPhone}}</td> 
                                        <td>
                                            <a href="{{ route('advisors.edit', ['id'=>$items->academicAdvisor_id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar datos empresa"></i></a>
                                            <form style="display: inline" methosd="post" action="{{ route('advisors.destroy', ['id'=>$items->academicAdvisor_id]) }}">
                                                {!! method_field('DELETE') !!}
                                                {!! csrf_field() !!}
                                                <button type = "submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar empresa"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <p>No existen asesores académicos</p>
                                        </td>
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

