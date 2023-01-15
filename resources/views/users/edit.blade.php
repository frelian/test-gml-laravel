@extends('layouts.app')

@section('content')
    <br>
    <h5 class="center" >
        <span class="negrita">
            Edición de usuario
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
                    <div class="col s10 m10 l10">

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
                            <form method="POST" action="{{ url('/users/update/') }}/{{ $user->id }}">
                                {{ csrf_field() }}
                                @method("PUT")

                                <input type="hidden" name="id" class="id" value="{{ $user->id }}">


                                <div class="row">
                                    <div class="input-field col s6 l3">
                                        <select name="category_id" id="category_id" required>

                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if($category->id === $user->categories_id) selected @endif>{{ $category->category_name }}</option>
                                            @endforeach

                                        </select>
                                        <label id="lblcategory_id" for="category_id">Categoría</label>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="input-field col s6 l2">
                                        <input placeholder="" name="identification_card" id="identification_card" type="text" class="validate" value="{{ $user->identification_card }}" required>
                                        <label id="lblcedula" for="name">Cédula</label>
                                        @error('identification_card')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-field col s12 l4">
                                        <input placeholder="" name="first_name" id="first_name" type="text" class="validate" value="{{ $user->first_name }}" >
                                        <label id="lblfirst_name" for="name">Nombre</label>
                                        @error('first_name')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12 l4">
                                        <input placeholder="" name="last_name" id="last_name" type="text" class="validate" value="{{ $user->last_name }}" required>
                                        <label id="lblNombre" for="Nombre">Apellido</label>
                                        @error('last_name')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s6 l4">
                                        <input placeholder="" name="email" id="email" type="text" class="validate" value="{{ $user->email }}" required>
                                        <label id="lblEmail" for="email">Email</label>
                                        @error('email')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s10 l4">
                                        <select name="country" id="country" required>

                                            @foreach($countries as $country)
                                                <option value="{{ $country }}" @if($country === $user->country) selected @endif>{{ $country }}</option>
                                            @endforeach

                                        </select>
                                        <label id="lblcountry" for="country">País</label>
                                    </div>
                                    <div class="input-field col s2 l5">
                                        <input  name="address" id="address" type="text" class="validate" value="{{ $user->address }}" >
                                        <label id="lbladdress" for="name">Direccion</label>
                                        @error('address')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-field col s2  l2">
                                        <input  name="cellphone" id="cellphone" type="text" class="validate" value="{{ $user->cellphone }}" >
                                        <label id="lblcellphone" for="name">Celular</label>
                                        @error('cellphone')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row center-align">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="material-icons">save</i>
                                        Actualizar
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
