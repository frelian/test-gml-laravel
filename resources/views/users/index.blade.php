@extends('layouts.app')
@section('content')
    <h5 class="center" ><span class="negrita">Usuarios</span></h5>
    <br>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <a href="javascript:" class="btn btn-light showFilterSearch" isActive="0">
                                <i class="tiny material-icons">touch_app</i> Filtros
                            </a>
                            @if( $filtered )
                                <a href="{{ route('users.index') }}" class="btn btn-light"><i class="tiny material-icons">clear_all</i> Limpiar filtro</a>
                            @endif
                            <a href="{{ route('users.create') }}" class="btn btn-outline-primary waves-effect waves-light pull-right modal-trigger btn-crear">
                                <i class="material-icons">add_circle_outline</i> Nuevo
                            </a>
                            <br><br>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <i class="small material-icons">info_outline</i> {{ session('success') }}
                    </div>
                @endif

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div id="formFilter" class="container">
                    <form id="formFilterSearch" class="formHse" style="display:none;">

                        <div class="row">
                            <div class="col s3">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text" name="firstname_user" value="{{ Request::get('firstname_user') }}">
                                </div>
                            </div>

                            <div class="col s3">
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" name="lastname_user" value="{{ Request::get('lastname_user') }}">
                                </div>
                            </div>

                            <div class="col s3">
                                <div class="form-group">
                                    <label>Cédula</label>
                                    <input type="text" name="ident_user" value="{{ Request::get('ident_user') }}">
                                </div>
                            </div>

                        </div>
                        <div>
                            <button type="submit" class="btn btn-outline-primary"> <i class="small material-icons">search</i> Buscar</button>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col">
                        <span class="font-bold">Total consultados: </span>{{ $total }}
                    </div>
                </div>
                @if ($filtered)
                    <div class="row">
                        <div class="col">
                            <span class="font-bold">Filtros aplicados: </span>

                            @if ( $firstname_user )
                                "{{ $firstname_user }}" (Nombre)
                            @endif

                            @if ( $lastname_user )
                                "{{ $lastname_user }}" (Apellido)
                            @endif

                            @if ( $ident_user )
                                "{{ $ident_user }}" (Cédula)
                            @endif

                        </div>
                    </div>
                @endif

                <div id="cert-area" class="panel-body_">

                    <table class="highlight responsive-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cédula</th>
                            <th>Email</th>
                            <th>País</th>
                            <th>Dirección</th>
                            <th>Celular</th>
                            <th colspan="3"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr class="item-row{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->category_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->identification_card }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->country }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->cellphone }}</td>

                                <td>
                                    <a
                                        class="tooltipped"
                                        href="{{ url('/users/show/' . $user->id) }}"
                                        data-position="bottom"
                                        data-tooltip="Ver usuario"
                                    >
                                        <button class="btn btn-outline-info btn-sm">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                    </a>
                                    <a
                                        class="tooltipped"
                                        href="{{ url('/users/edit/' . $user->id ) }}"
                                        data-position="bottom"
                                        data-tooltip="Editar usuario"
                                    >
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </a>

                                    <a class="btnDelete btn btn-sm btn-danger tooltipped"
                                       data-position="bottom"
                                       data-tooltip="Eliminar"
                                       data-id="{{ $user->id }}">
                                        <i class="material-icons">delete_forever</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row center-align">

                        {{ $users->appends([
                            'firstname_user' => $firstname_user,
                            'lastname_user'  => $lastname_user,
                            'ident_user'     => $ident_user,
                        ])->links('vendor.pagination.materializecss') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('myscripts')
    <script src="{{ asset('js/users.js') }}" defer type="text/javascript"></script>
@stop
