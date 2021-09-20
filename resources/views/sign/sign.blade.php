<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Software libre para la gestión de evidencias de trabajo en jornadas docentes" />

    <title>Firmar asistencia | Evidentia Cloud</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

    <!-- Theme style -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.css')}}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">

</head>

<body class="hold-transition login-page">
<div class="login-box">

    <div class="mb-4">
        <a href="{{route('instances.home')}}"><img width="200px" src="{{asset('dist/img/logo_light.svg')}}"></a>
    </div>

    @if($signature_sheet->meeting_request)

        <dl class="row" style="margin-top: 30px; margin-bottom: 30px">

            <dt class="col-sm-4">Convocatoria</dt>
            <dd class="col-sm-8">{{$signature_sheet->meeting_request->title}}</dd>
            <dd class="col-sm-8 offset-sm-4">
                {{ \Carbon\Carbon::parse($signature_sheet->meeting_request->datetime)->format('d/m/Y') }}
                {{ \Carbon\Carbon::parse($signature_sheet->meeting_request->datetime)->format('H:i') }}
            </dd>
            <dd class="col-sm-8 offset-sm-4">
                {{$signature_sheet->meeting_request->place}}
            </dd>

            <dt class="col-sm-4">Comité</dt>
            <dd class="col-sm-8">{{$signature_sheet->meeting_request->comittee->name}}</dd>

        </dl>
    @endif

    <form action="{{route('sign_p',\Instantiation::instance())}}" method="post">
        @csrf

        <input type="hidden" name="signature_sheet" value="{{$signature_sheet->id}}"/>

        <div class="row">

            <div class="col-lg-6">
                <div class="input-group mb-3">
                    <input name="username" required="" type="text" class="form-control" placeholder="UVUS" autocomplete="username" autofocus="">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="input-group mb">
                    <input name="password" required="" type="password" class="form-control" placeholder="Contraseña" autocomplete="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <br>

        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-signature"></i> Firmar asistencia</button>
            </div>
        </div>

    </form>


</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>

<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<!-- Selectors -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<!-- File Input -->
<link href="{{asset('dist/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />
<link href="{{asset('dist/themes/explorer/theme.css')}}" media="all" rel="stylesheet" type="text/css" />
<script src="{{asset('dist/js/plugins/piexif.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/js/plugins/sortable.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/js/plugins/purify.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="{{asset('dist/js/fileinput.js')}}"></script>
<script src="{{asset('dist/themes/fas/theme.js')}}"></script>
<script src="{{asset('dist/themes/explorer/theme.js')}}"></script>
<script src="{{asset('dist/js/fileinput_locales/es.js')}}"></script>

<script>
    // estados
    @if (session('success'))

    $(document).Toasts('create', {
        title: '¡Felicidades!',
        icon: 'fas fa-check-circle',
        class: 'bg-success',
        autohide: true,
        delay: 7000,
        body: '{!!  session("success") !!}'
    });

    @endif

    @if (session('error'))

    $(document).Toasts('create', {
        title: '¡Error!',
        icon: 'icon fas fa-ban',
        class: 'bg-danger',
        autohide: true,
        delay: 7000,
        body: '{!!  session("error") !!}'
    });

    @endif

    @if (session('warning'))

    $(document).Toasts('create', {
        title: '¡Aviso!',
        icon: 'icon fas fa-ban',
        class: 'bg-danger',
        autohide: true,
        delay: 7000,
        body: '{!!  session("warning") !!}'
    });

    @endif

    @if (session('light'))

    $(document).Toasts('create', {
        title: 'Restablecer contraseña',
        icon: 'fas fa-info',
        class: 'bg-light',
        autohide: true,
        delay: 7000,
        body: '{!!  session("light") !!}'
    });

    @endif
</script>

</body>

</html>
