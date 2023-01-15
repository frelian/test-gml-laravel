<!--

<div class="card mt-4">
    <div class="card-header">Detalles del usuario # {{ $user->id }}</div>
    <div class="card-body">
        <div class="card-body">
            <p class="card-text">Categoria : {{ $user->category_id }}</p>
            <p class="card-text">Nombre : {{ $user->names }}</p>
            <p class="card-text">Apellido : {{ $user->last_name }}</p>
            <p class="card-text">Cedula : {{ $user->identification_card }}</p>
            <p class="card-text">email : {{ $user->email }}</p>
            <p class="card-text">country : {{ $user->country }}</p>
            <p class="card-text">Pais : {{ $user->country }}</p>
            <p class="card-text">Celular : {{ $user->cellphone }}</p>
        </div>
        </hr>
    </div>
</div>
-->

@extends('layouts.app')

@section('content')
    <br>
    <h5 class="center" >
        <span class="negrita">
            Detalles del usuario
        </span>
    </h5>
    <h6 class="center" >
        # {{ $user->id }}
    </h6>
    <br>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">

                <div class="row">
                    <div class="col s6">
                        <span class="negrita">Registrado:</span>
                        <div class="chip green-group">
                            {{ $created }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s10 m10 l10">
                        <a href="{{ route('users.edit', ['id' => $user->id]) }}"
                           class="btn btn-outline-primary" role="button" aria-disabled="true">
                            Editar
                        </a>
                    </div>
                    <div class="col s2 m2 l2">

                        <a href="{{ route('users.index') }}" class="btn-light waves-effect waves-light btn-small btn-editar-client">
                            <i class="material-icons left">reply_all</i> Volver
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 12">
                        <div class="card-panel transparent">

                            <br>
                            <div class="row" style="margin-bottom: 4px !important;">
                                <div class="col s3 negrita align-end">Cedula:</div>
                                <div class="col s6">
                                    {{ $user->identification_card }}
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 4px !important;">
                                <div class="col s3 negrita align-end">Nombre:</div>
                                <div class="col s6">{{ $user->first_name . ' ' . $user->last_name }}</div>
                            </div>

                            <div class="row" style="margin-bottom: 4px !important;">
                                <div class="col s3 negrita align-end">Categoria:</div>
                                <div class="col s6">
                                    {{ $user->category_name }}
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 4px !important;">
                                <div class="col s3 negrita align-end">Email:</div>
                                <div class="col s6">
                                    {{ $user->email }}
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 4px !important;">
                                <div class="col s3 negrita align-end">País:</div>
                                <div class="col s6">
                                    @if ( $user->country )
                                        {{ $user->country }}
                                    @else
                                        ______
                                    @endif
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 4px !important;">
                                <div class="col s3 negrita align-end">Direccion:</div>
                                <div class="col s6">{{ $user->address }}</div>
                            </div>

                            <div class="row" style="margin-bottom: 4px !important;">
                                <div class="col s3 negrita align-end">Celular:</div>
                                <div class="col s6">
                                    {{ $user->cellphone }}
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('myscripts')

@stop



