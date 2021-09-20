@extends('layouts.app')

@section('title', 'Mis hojas de firmas')

@section('title-icon', 'fas fa-signature')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/{{$instance}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('secretary.meeting.manage',\Instantiation::instance())}}">Gestionar reuniones</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

    <div class="row">

        <x-menumeeting/>

        <div class="col-md-9">

            <div class="card shadow-sm">

                <div class="card-body">

                    <table id="dataset" class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Creada</th>
                            <th scope="col">URL para firmar</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($signature_sheets as $signature_sheet)
                            <tr scope="row">
                                <td>
                                    {{$signature_sheet->title}}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($signature_sheet->created_at)->diffForHumans() }}
                                </td>
                                <td>

                                    <span id="signature_sheets_{{$signature_sheet->id}}">
                                        <a href="{{URL::to('/')}}/{{$instance}}/sign/{{$signature_sheet->random_identifier}}" target="_blank">
                                            {{URL::to('/')}}/{{$instance}}/sign/{{$signature_sheet->random_identifier}}
                                        </a>
                                    </span>

                                </td>
                                <td>
                                    <button onclick="copyToClipboard('#signature_sheets_{{$signature_sheet->id}}')"
                                            type="button" class="btn btn-light btn-xs"><i class="far fa-copy"></i> Copiar URL</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>


        </div>
    </div>


@endsection
