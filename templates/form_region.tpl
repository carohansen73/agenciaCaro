<form action="InsertarRegion" method="POST" class="my-4" enctype="multipart/form-data">
    <div class=" mx-auto">
        <div class="col-9 ">
            <div class="form-group w-50">
                <label>Nombre</label>
                <input name="nombre" type="text" class="form-control">
            </div>
        </div>

        <div class="col-9 ">
            <div class="form-group w-50">
                <label>Informacion</label>
                <textarea name="informacion" class="form-control" rows="1"></textarea>
            </div>
        </div>

        <label for="img"> Imagen: </label>
        <input type="file" name="input_name" id="imageToUpload">
    </div>

    <div class="col-9 ">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>