@if(\Illuminate\Support\Facades\Auth::user()->hasRole('STUDENT'))

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-header">MIS COSAS</li>
            <x-li route="task.list" icon='fas fa-clock' name="Mis tareas"/>
            @if(!\Carbon\Carbon::now()->gt(\Config::upload_evidences_timestamp()))
            <x-li route="evidence.create" icon='fab fa-angellist' name="Crear evidencia"/>
            @endif
            <x-li route="evidence.list" secondaries="evidence.view,evidence.edit" icon='fas fa-id-badge' name="Mis evidencias"/>
            <x-li route="meeting.list" icon='fas fa-cocktail' name="Mis reuniones"/>
            <x-li route="attendee.list" icon='fas fa-hiking' name="Mis asistencias"/>
            <x-li route="kanban.list" secondaries="kanban.view" icon='fas fa-folder' name="Tableros Kanban"/>

        </ul>
    </nav>
@endif

