@extends('layouts.app')

@section('content')
    <br>
    <h5 class="center" >
        <span class="negrita">
            Nuevo usuario
        </span>
    </h5>
    <br>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ dd(session('success')) }}
        </div>
    @endif

    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror


    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s10 m10 l10">

                    </div>
                    <div class="col s2 m2 l2">
                        <a href="{{ route('users.index') }}" class="btn-light waves-effect waves-light btn-small btn-editar-client">
                            <i class="material-icons left">reply_all</i> Volver
                        </a>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col s12 12">
                        <div class="card-panel transparent">
                            <form method="POST" action="{{ route('users.store') }}">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="input-field col s6 l3">
                                        <select name="category_id" id="category_id" requireda>

                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach

                                        </select>
                                        <label id="lblcategory_id" for="category_id">Categoría</label>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="input-field col s6 l2">
                                        <input placeholder="" name="identification_card" id="identification_card" type="text" class="validate" value="{{ old('identification_card') }}" required>
                                        <label id="lblcedula" for="name">Cédula</label>
                                        @error('identification_card')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-field col s12 l4">
                                        <input placeholder="" name="first_name" id="first_name" type="text" class="validate" value="{{ old('first_name') }}" required>
                                        <label id="lblfirst_name" for="name">Nombre</label>
                                        @error('first_name')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12 l4">
                                        <input placeholder="" name="last_name" id="last_name" type="text" class="validate" value="{{ old('last_name') }}" required>
                                        <label id="lblNombre" for="Nombre">Apellido</label>
                                        @error('last_name')
                                              <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s6 l4">
                                        <input placeholder="" name="email" id="email" type="email" class="validate" value="{{ old('email') }}" required>
                                        <label id="lblEmail" for="email">Email</label>
                                        @error('email')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s8 l4">
                                        <select name="country" id="country" required>

                                            @foreach($countries as $country)
                                                <option value="{{ $country }}" >{{ $country }}</option>
                                            @endforeach

                                        </select>
                                        <label id="lblcountry" for="country">País</label>
                                        @error('country')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-field col s8 l5">
                                        <input  name="address" id="address" type="text" class="validate" value="{{ old('address') }}" required>
                                        <label id="lbladdress" for="name">Direccion</label>
                                        @error('address')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-field col s4 l2">
                                        <input  name="cellphone" id="cellphone" type="text" class="validate" value="{{ old('cellphone') }}" required>
                                        <label id="lblcellphone" for="name">Celular</label>
                                        @error('cellphone')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row center-align">
                                    <button type="submit" class="btn btn-success">
                                        <i class="material-icons">save</i>
                                        Registrar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
