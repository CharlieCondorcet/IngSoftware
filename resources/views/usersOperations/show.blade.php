@extends('helpers.template')

@section('title_head', 'Usuario | '.$user->name)

@section('content_body')

    <div class="container">

        <div class="row my-4">

            <div class="col-12 col-lg-6">
                <img class="img-fluid my-3" src="{{ URL::to('/')}}/img/showauser.svg" alt="actividades bitacora ucn">
            </div>

            <div class="col-12 col-lg-6">
                <div class="card shadow-sm">

                    <h3 class="card-header text-center">{{ $user->name  }}</h3>

                    <div class="card-body">

                        <div class="card px-3">

                            <div class="input-group my-3">
                                <div class="input-group-prepend">
                                    <p class="input-group-text">E-mail</p>
                                </div>
                                <p class="form-control" aria-describedby="basic-addon3"> {{ $user->email }} </p>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <p class="input-group-text">Rut</p>
                                </div>
                                <p class="form-control" aria-describedby="basic-addon3"> {{ $user->rut }} </p>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <p class="input-group-text">Carrera</p>
                                </div>
                                <p class="form-control" aria-describedby="basic-addon3"> {{ $user->carrera }} </p>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <p class="input-group-text">Disponibilidad</p>
                                </div>
                                <p class="form-control"
                                   aria-describedby="basic-addon3"> {{ $user->disponibilidad }} </p>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <p class="input-group-text">Rol</p>
                                </div>
                                <p class="form-control" aria-describedby="basic-addon3"> {{ $user->rol }} </p>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <p class="input-group-text">Rol Secundario</p>
                                </div>
                                <p class="form-control"
                                   aria-describedby="basic-addon3"> {{ $user->rol_secundario }} </p>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <p class="input-group-text">Estado</p>
                                </div>
                                <p class="form-control" aria-describedby="basic-addon3"> {{ $user->estado }} </p>
                            </div>

                            <!-- BOTON DE ELIMINAR O REACTIVACION DEL USUARIO -->
                            @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Admin')
                                <div class="py-3">
                                    <a class="btn btn-lg btn-outline-warning btn-block rounded-pill mb-2 text-dark"
                                       href="{{ route('users-edit', $user) }}"> Editar </a>

                                    @if($user->rol!=='Admin')
                                        <form method="POST" action="{{ route('users-remover', $user) }}">
                                            @csrf
                                            @method('PATCH')
                                            @if($user->estado == 'Activo')
                                                <input type="hidden" name="estado" value="Removido">
                                                <input type="hidden" name="disponibilidad" value="No">
                                            @else
                                                <input type="hidden" name="estado" value="Activo">
                                                <input type="hidden" name="disponibilidad" value="Si">
                                            @endif

                                            @if($user->estado == 'Activo')
                                                <a class="btn btn-lg btn-outline-danger btn-block rounded-pill"
                                                   data-toggle="modal" data-target="#eliminarUsuario" type="submit">
                                                    Eliminar
                                                </a>

                                                <!-- Modal | Mensaje de alerta para confirmacion de eliminacion de un usuario -->
                                                @include('helpers.modalEliminarUsuario')

                                            @else
                                                <a class="btn btn-lg btn-outline-danger btn-block rounded-pill"
                                                   data-toggle="modal" data-target="#reactivarUsuario" type="submit">
                                                    Reactivar
                                                </a>

                                                <!-- Modal | Mensaje de alerta para confirmacion de REACTVACION de un usuario -->
                                                @include('helpers.modalReactivarUsuario')
                                            @endif

                                        </form>
                                    @endif
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
