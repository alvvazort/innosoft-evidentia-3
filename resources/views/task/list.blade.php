@extends('layouts.app')

@section('title', 'Mis tareas')

@section('title-icon', 'fas fa-id-badge')

@section('breadcrumb')
    
    <li class="breadcrumb-item active">@yield('title')</li>
    
@endsection

@section('content')

    <div class="form-group col-md-4">
        <button type="button" style = "width:auto;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-clock"></i>
         &nbsp;Empezar cronómetro</button>
    </div>
    <!-- BOTON PARAR FUTURA VERSION
    <div class="form-group col-md-4">
        <button type="button" style = "width:auto; background-color:#dc3545; border-color:#dc3545;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-clock"></i>
         &nbsp;Parar cronómetro</button>
    </div>
    -->
    <div class="row">
    
    <div class="col-lg-12">

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="form-row">

                <x-input col="4" attr="title" :value="$evidence->title ?? ''" label="Título"/>
                <x-input col="5" attr="title" :value="$evidence->title ?? ''" label="Descripción"/>

                <div class="form-group col-md-3">
                    <label for="comittee">Comité asociado</label>
                    <select id="comittee" class="selectpicker form-control @error('comittee') is-invalid @enderror" name="comittee" value="{{ old('comittee') }}" required autofocus>
                        @foreach($comittees as $comittee)
                            @isset($evidence)
                                <option {{$comittee->id == old('comittee') || $evidence->comittee->id == $comittee->id ? 'selected' : ''}} value="{{$comittee->id}}">
                            @else
                                <option {{$comittee->id == old('comittee') ? 'selected' : ''}} value="{{$comittee->id}}">
                                    @endisset
                                    {!! $comittee->name !!}
                                </option>
                                @endforeach
                    </select>

                    @error('comite')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
            </div>


        </div>
    </div>

    <div class="col-lg-12">

    <div class="card shadow-sm">

        <div class="card-body">
            <h2>Lista de tareas</h2>

            <div class="col-md-12">

                <table id="dataset" class="table table-hover table-responsive col-md-12">
                    <thead>
                    <tr>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">ID</th>
                        <th>Título</th>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Horas</th>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Comité</th>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Creada</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- AÑADIR FUNCION LISTAR TAREAS -->
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')

        

    @endsection

@endsection
