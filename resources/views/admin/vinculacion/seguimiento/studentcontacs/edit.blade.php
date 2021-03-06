@extends('layouts.master')

@section('header')
    <h1>Información alumno</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><center><h3>Verificar datos generales e información de contacto</h3></center></div><br>
                      <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-warning"></i>Al correo personal otorgado se le enviará el vínculo para contestar la encuesta.</h5>
                      </div>                  
                    <div class="card-body ">
                        <form name="frmcontact" method="post" action="{{ route('studentcontact.update', [Crypt::encrypt($student->student_id)]) }}">
                            {!! method_field('PUT') !!}
                            {!! csrf_field() !!}
                            @if (count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @php
                                $arr = \Session::get('error');
                                if(!empty($arr)){
                                $error = count($arr);                            
                                if($error > 0){
                            @endphp                            
                                    <div class="alert alert-danger">
                                        <ul>
                                            @for($i=0; $i < $error; $i++)
                                                    <li>{{ $arr[$i] }}</li>
                                            @endfor
                                        </ul>
                                    </div>
                            @php } 

                                }
                            @endphp
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    <ul>
                                        {{Session::get('flash_message')}}
                                    </ul>
                                </div>
                            @endif                                                      
                            <div class="row col-xs-12">
                                <label for="carrera" class="col-form-label text-md-right">Información de estadía</label>
                            </div>                            
                            <div class="row">
                                <div class="form-group col-xs-8">
                                    <label for="gradoAcademico" class="col-form-label text-md-right">Empresa</label>
                                    <select name="gradoAcademico" id="gradoAcademico" required class="form-control @error('gradoAcademico') is-invalid @enderror" {{ $locked }}>
                                            @foreach($enterprise as $items)
                                                @if($items->enterprise_id == $student->document->enterprise_id)
                                                    <option value="{{ $items->enterprise_id }}" selected>{{ $items->companyName }}</option>
                                                @else
                                                    <option value="{{ $items->enterprise_id }}">{{ $items->companyName }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>                                
                                <div class="form-group col-xs-4">
                                    <label for="horas" class="col-form-label text-md-right">Horas a desempeñar</label>
                                    <input id="horas" type="text" class="form-control @error('horas') is-invalid @enderror" name="horas" value="{{$student->document->hoursStay}}" required autocomplete="horas" autofocus {{ $locked }}>
                                </div>
                            </div>
                            <div class="row col-xs-12">
                                <label for="carrera" class="col-form-label text-md-right">Información alumno</label>
                            </div>                                                       
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="nombre" class="col-form-label text-md-right">Nombre</label>
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                    value="{{ $student->name }}" required autocomplete="nombre" autofocus {{ $locked }}>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="apellidoMat" class="col-form-label text-md-right">Apellido paterno</label>
                                    <input id="apellidoMat" type="text" class="form-control @error('apellidoMat') is-invalid @enderror" name="apellidoMat" value="{{ $student->lastName }}" required autocomplete="apellidoMat" autofocus {{ $locked }}>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="apellidoPat" class="col-form-label text-md-right">Apellido materno</label>
                                    <input id="apellidoPat" type="text" class="form-control @error('apellidoPat') is-invalid @enderror" name="apellidoPat" 
                                    value="{{ $student->motherLastNames }}" required autocomplete="apellidoPat" autofocus {{ $locked }}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="matricula" class="col-form-label text-md-right">Matrícula</label>
                                    <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula"
                                    value="{{ $student->enrollment }}" required autocomplete="nombre" autofocus {{ $locked }}>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="school" class="col-form-label text-md-right">Escuela de procedencia</label>
                                    <select name="school" id="school" required class="form-control @error('school') is-invalid @enderror" {{ $locked }}>
                                            @foreach($school as $items)
                                                @if($items->schoolOrigin_id == $student->schoolOrigin_id)
                                                    <option value="{{ $items->schoolOrigin_id }}" selected>{{ $items->schoolName }}</option>
                                                @else
                                                    <option value="{{ $items->schoolOrigin_id }}">{{ $items->schoolName }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>                                 
                                <div class="form-group col-xs-4">
                                    <label for="curp" class="col-form-label text-md-right">CURP</label>
                                    <input id="curp" type="text" class="form-control @error('curp') is-invalid @enderror" name="curp" 
                                    value="{{ $student->curp }}" required autocomplete="curp" autofocus {{ $locked }}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="degree" class="col-form-label text-md-right">Carrera</label>
                                    <select name="degree" id="degree" required class="form-control @error('degree') is-invalid @enderror" {{ $locked }}>
                                            @foreach($degree as $items)
                                                @if($items->degree_id == $student->degree_id)
                                                    <option value="{{ $items->degree_id }}" selected>{{ $items->degreeName }}</option>
                                                @else
                                                    <option value="{{ $items->degree_id }}">{{ $items->degreeName }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="gradoAcademico" class="col-form-label text-md-right">Grado académico</label>
                                    <select name="gradoAcademico" id="gradoAcademico" required class="form-control @error('gradoAcademico') is-invalid @enderror" {{ $locked }}>
                                            @foreach($program as $items)
                                                @if($items->educativeProgram_id == $student->educativeProgram_id)
                                                    <option value="{{ $items->educativeProgram_id }}" selected>{{ $items->shortName }}</option>
                                                @else
                                                    <option value="{{ $items->educativeProgram_id }}">{{ $items->shortName }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="correo" class="col-form-label text-md-right">Correo institucional</label>
                                    <input id="correo" type="text" class="form-control @error('correo') is-invalid @enderror" name="correo" id="correo2"
                                    value="{{ $student->institutionalEmail }}" required autocomplete="correo" autofocus {{ $locked }}>
                                </div>
                            </div>
                            <div class="row col-xs-12">
                                <label for="carrera" class="col-form-label text-md-right">Información de contacto</label>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="telCelular" class="col-form-label text-md-right">Teléfono celular</label>
                                    <input id="telCelular" type="text" class="form-control @error('telCelular') is-invalid @enderror" name="telCelular" value="{{ $student->cellPhone }}" autocomplete="telCelular" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="telOficina" class="col-form-label text-md-right">Teléfono oficina</label>
                                    <input id="telOficina" type="text" class="form-control @error('telOficina') is-invalid @enderror" name="telOficina" value="{{ $student->officePhone }}" autocomplete="telOficina" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="correoPersonal" class="col-form-label text-md-right">Correo personal</label>
                                    <input id="correoPersonal" type="text" class="form-control @error('correoPersonal') is-invalid @enderror" name="correoPersonal" id="correPersonal2"
                                    value="{{ $student->personalEmail }}" autocomplete="correoPersonal" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="facebook" class="col-form-label text-md-right">Red social facebook</label>
                                    <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $student->facebook }}" autocomplete="facebook" autofocus>
                                </div>
                                <div class="form-group col-xs-4">&nbsp;</div>
                                <div class="form-group col-xs-4">
                                    <label for="facebook" class="col-form-label text-md-right">Confirmar correo personal</label>
                                    <input id="correoPersonalConfirma" type="text" class="form-control @error(correoPersonalConfirma') is-invalid @enderror" name="correoPersonalConfirma" value="" autocomplete=correoPersonalConfirma" autofocus>
                                </div>                                                                
                            </div>                                
                            <div class="row">
                                 <div class="form-group"><center>
                                    <button type="submit" name="valida" id="valida2" class="btn btn-primary">Validar información</button>&nbsp;
                                    <a href="{{ route('studentcontact.index') }}" class="btn btn-default">Cancelar</a>
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
@push('jscustom')
<script type="text/javascript">
    $(document).ready(function () {
        $("#valida2").click(function() {
            var correoBase,correoPersonal,correoConfirma,celular,telefono,facebook;
            correoPersonal = $("#correoPersonal").val();
            correoConfirma = $("#correoPersonalConfirma").val();
            celular = $("#telCelular").val();
            telefono = $("#telOficina").val();
            facebook = $("#facebook").val();                                    

            if((correoPersonal == "") || (correoConfirma=="") || (celular=="") || (facebook=="")){
                alert("¡Especifique la información de contacto!");
                return false;                
            }

            if(correoPersonal !== correoConfirma){
               alert("¡Verifique el correo personal no coinciden!");
               return false;
            }

            correoBase = $("#correo").val();
            tmpCorreo = correoBase.split("@");
            tmpCorreoP = correoPersonal.split("@");

            if(tmpCorreoP[1] === tmpCorreo[1]){
                alert("El correo personal no debe ser tipo institucional");
                return false;
            }

            if(confirm("¿ Desea registrar su información de contacto ?")){
               return true;
            }else{
                  return false;
            }

        });
    });
</script>
@endpush