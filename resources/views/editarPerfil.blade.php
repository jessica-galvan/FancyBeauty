@extends('master')
@section('css')
  <?php
    include('/partials/listas-editar.php');
    $CSS = ['form', 'perfil'];?>
@endsection
@section('content')
    @yield('lista-editar')
    <div class="editar-form">
        <div class="login-text">
            <h2 id="titulo-editar">Editar mi perfil</h2>
        </div>
        <form class="container-editarPerfil" action="editarPerfil.php" method="post" enctype="multipart/form-data">
            <!-- SECCION TIPO -->
            <section class="form-editar">
                <label for="tipoDePiel">Tipo de piel:</label>
                <?php
                foreach ($listaTipoDePiel as $tipo) {
                    if ($usuario['tipoPiel'] == $tipo['dato']): ?>
                        <div class="check-box">
                            <input type="radio" name="tipoDePiel" value="<?=$tipo['valor']?>" checked><span><?=$tipo['dato']?></span>
                        </div>
                    <?php else: ?>
                        <div class="check-box">
                            <input type="radio" name="tipoDePiel" value="<?=$tipo['valor']?>"><span><?=$tipo['dato']?></span>
                        </div>
                    <?php endif; } ?>
            </section>

            <!-- SECCION TONO -->
            <section class="form-editar">
                <label for="tonoDePiel">Tono de piel:</label>
                <?php foreach ($listaTonoDePiel as $tono) {
                    if ($usuario['tonoPiel'] == $tono['dato']):?>
                    <div class="check-box">
                        <input type="radio" name="tonoDePiel" value="<?=$tono['valor']?>" checked><span><?=$tono['dato']?></span>
                    </div>
                <?php else: ?>
                    <div class="check-box">
                        <input type="radio" name="tonoDePiel" value="<?=$tono['valor']?>"><span><?=$tono['dato']?></span>
                    </div>
                <?php endif; }?>
            </section>

            <!-- SECCION GENERO -->
            <section class="form-editar" id='genero-checkbox'>
                <label for="genero">Género:</label>
                <div class="genero-options">
                    <?php foreach ($listaGenero as $generos) {
                        if ($usuario['genero'] == $generos['dato']):?>
                        <div class="check-box">
                            <input type="radio" name="genero" value="<?=$generos['valor']?>" checked><span><?=$generos['dato']?></span>
                        </div>
                    <?php else: ?>
                        <div class="check-box">
                            <input type="radio" name="genero" value="<?=$generos['valor']?>"><span><?=$generos['dato']?></span>
                        </div>
                    <?php endif; }?>
                </div>
            </section>

            <!--SECCION PROVINCIA-->
            <section class="form-editar">
                <label for="ubicacion">Provincia:</label>
                <select class="" name="provincia">
                    <?php if($provinciaRespuesta  == ""): ?>
                        <option hidden value=""> <i>Seleccionar</i> </option>
                    <?php endif; ?>
                    <?php foreach ($listaProvincia as $unaProvincia) {
                        if ($usuario['provincia'] == $unaProvincia['dato']):?>
                        <option value='<?=$unaProvincia['valor']?>' selected>
                            <?=$unaProvincia['dato']?>
                        </option>
                        <?php else: ?>
                            <option value='<?=$unaProvincia['valor']?>'>
                                <?=$unaProvincia['dato']?>
                            </option>
                        <?php endif; }?>
                </select>
            </section>

            <!-- FECHA DE NACIMIENTO -->
            <div class="form-editar">
                <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fechaNacimiento" value="{{$usuario['date_of_birth']}}">
            </div>

            <!--SECCION FOTO-->
            <div class="form-editar">
                <label for="foto">Foto de Perfil:</label>
                <input type="file" name="foto" value="">
                <span class="error-form">{{$errors->foto}}</span>
            </div>

            <!--BOTON ENVIAR-->
            <div class="editar-button">
                <button type="submit" name="editar">ENVIAR</button>
            </div>
        </form>
    </div>
@endsection
