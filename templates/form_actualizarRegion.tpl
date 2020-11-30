<form action="ActulizarRegion" method="POST" class="my-4" enctype="multipart/form-data">
    <div class=" mx-auto">
        <div class="col-9 ">
            <div class="form-group w-50">
                <label>Nombre</label>
                <input name="nombre" type="text" class="form-control">
            </div>
        </div>
        
        <div class="form-group w-50">
            <label>Informacion</label>
            <textarea name="informacion" class="form-control" rows="3"></textarea>
        </div>
        <input name="id" type="hidden" value="{$region->id}">
        
        <label for="img"> Imagen: </label>
        <input type="file" name="input_name" id="imageToUpload">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>