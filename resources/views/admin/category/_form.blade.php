<div class="form-group @if($errors->has('name')) has-danger @endif">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control  @if($errors->has('name')) form-control-danger @endif"
        placeholder="Nombre">
    @if ($errors->has('name'))
    <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class="form-group @if($errors->has('description')) has-danger @endif">
    <label for="description">Descripcion</label>
    <textarea class="form-control  @if($errors->has('description')) form-control-danger @endif" name="description"
        id="description" rows="3"></textarea>
    @if ($errors->has('name'))
    <label class="error mt-2 text-danger" for="">{{ $errors->first('description') }}</label>
    @endif
</div>
