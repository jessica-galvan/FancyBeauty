@extends('master')
@section('css')
  <?php $CSS = ['form', 'perfil'];?>
@endsection
@section('content')
    @yield('lista-editar')
    <div class="editar-form">
        <div class="login-text">
            <h2 id="titulo-editar">Editar mi perfil</h2>
        </div>
        <form class="container-editarPerfil" action="/perfil/editar" method="post" enctype="multipart/form-data">
            @csrf
            <section class="form-editar">
                <label for="tipoPiel">Tipo de piel:</label>
                @foreach ($listaArray['tipoPiel'] as $tipo)
                    @if ($usuario['tipoPiel'] == $tipo['dato'] || old('tipoPiel') == $tipo['valor'])
                        <div class="check-box">
                            <input type="radio" name="tipoPiel" value="<?=$tipo['valor']?>" checked><span><?=$tipo['dato']?></span>
                        </div>
                    @else
                        <div class="check-box">
                            <input type="radio" name="tipoPiel" value="<?=$tipo['valor']?>"><span><?=$tipo['dato']?></span>
                        </div>
                    @endif
                @endforeach
            </section>
            @foreach ($errors->all() as $error)
                <span>{{$error}}</span>
            @endforeach

            <section class="form-editar">
                <label for="tonoPiel">Tono de piel:</label>
                @foreach ($listaArray['tonoPiel'] as $tono)
                    @if ($usuario['tonoPiel'] == $tono['dato'] || old('tonoPiel') == $tono['valor'])
                    <div class="check-box">
                        <input type="radio" name="tonoPiel" value="<?=$tono['valor']?>" checked><span><?=$tono['dato']?></span>
                    </div>
                    @else
                    <div class="check-box">
                        <input type="radio" name="tonoPiel" value="<?=$tono['valor']?>"><span><?=$tono['dato']?></span>
                    </div>
                    @endif
                @endforeach
            </section>

            <section class="form-editar" id='genero-checkbox'>
                <label for="genero">Género:</label>
                <div class="genero-options">
                    @foreach ($listaArray['genero'] as $generos)
                        @if ($usuario['genero'] == $generos['dato'] || old('genero') == $generos['valor'])
                        <div class="check-box">
                            <input type="radio" name="genero" value="<?=$generos['valor']?>" checked><span><?=$generos['dato']?></span>
                        </div>
                        @else
                        <div class="check-box">
                            <input type="radio" name="genero" value="<?=$generos['valor']?>"><span><?=$generos['dato']?></span>
                        </div>
                        @endif
                    @endforeach
                </div>
            </section>

            <section class="form-editar">
                <label for="ubicacion">Provincia:</label>
                <select class="" name="provincia">
                    @if($usuario['provincia']  == "" || old('provincia') == "")
                        <option hidden value=""> <i>Seleccionar</i> </option>
                    @endif
                    @foreach ($listaArray['provincia'] as $unaProvincia) {
                        @if ($usuario['provincia'] == $unaProvincia['dato'] || old('provincia') == $unaProvincia['valor'])
                        <option value='<?=$unaProvincia['valor']?>' selected>
                            <?=$unaProvincia['dato']?>
                        </option>
                        @else
                            <option value='<?=$unaProvincia['valor']?>'>
                                <?=$unaProvincia['dato']?>
                            </option>
                        @endif
                    @endforeach
                </select>
            </section>

            @php
                if($usuario['date_of_birth'] != ""){
                    $fecha = $usuario['date_of_birth'];
                } elseif(old('fechaNacimiento') != "") {
                    $fecha = old('fechaNacimiento');
                } else {
                    $fecha = "";
                }
            @endphp
            <div class="form-editar">
                <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fechaNacimiento" value="{{$fecha}}">
            </div>

            <div class="form-editar">
                <label for="foto">Foto de Perfil:</label>
                <input type="file" name="foto" value="">
                @if(isset($errors->foto))
                    <span class="error-form">{{$errors->foto}}</span>
                @endif
            </div>

            <div class="editar-button">
                <button type="submit" name="editar">ENVIAR</button>
            </div>
        </form>
    </div>
@endsection
