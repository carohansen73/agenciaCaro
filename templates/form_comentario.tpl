<form action="InsertarComentario" id="form-comentario" method="POST" class="my-4">
    <div class=" mx-auto">
        <div class="col-9 ">
            <div class="form-group w-50">
                <label>Comentario</label>
                <textarea id="texto" name="comentario" class="form-control" rows="2"></textarea>
            </div>


            <label>Puntuación: </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2">2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                <label class="form-check-label" for="inlineRadio1">3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                <label class="form-check-label" for="inlineRadio2">4</label>
            </div>
             <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="5">
                <label class="form-check-label" for="inlineRadio2">5</label>
            </div>
            
            

        </div>    
    </div>
    
    <div class="col-9 ">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>