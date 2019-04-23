<input type="hidden" name="id" value=" {{ isset($desarrollador) ? $desarrollador->id : ''}} ">
<div class="form-row">
  <div class="form-group col-md-12">
    <label class="control-label">Nombre de usuario <b>*</b></label>
    <input name="username" type="text" placeholder="Nombre de usuario"
           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
           value="{{ old('username') ?? (isset($desarrollador) ? $desarrollador->username : '')}}"
           required autofocus autocomplete>
    @if ($errors->has('username'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('username') }}</strong>
      </span>
    @endif
  </div>
</div>
<!--.form-row username-->
<div class="form-row">
  <div class="form-group col-md-6">
    <label class="control-label">Nombre <b>*</b></label>
    <input name="nombre" type="text" placeholder="Nombre"
           class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
           value="{{ old('nombre') ?? (isset($desarrollador) ? $desarrollador->nombre : '')}}"
           required autocomplete>
    @if ($errors->has('nombre'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('nombre') }}</strong>
      </span>
    @endif
  </div>
  <div class="form-group col-md-6">
    <label class="control-label">Apellido <b>*</b></label>
    <input name="apellido" type="text" placeholder="Apellido"
           class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}"
           value="{{ old('apellido') ?? (isset($desarrollador) ? $desarrollador->apellido : '') }}"
           required autocomplete
    >
    @if ($errors->has('apellido'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('apellido') }}</strong>
      </span>
    @endif
  </div>
</div>
<!--.form-row nombre apellido-->
<div class="form-row">
  <div class="form-group col-md-6">
    <label class="control-label">Email <b>*</b></label>
    <input name="email" type="email" placeholder="Dirección email"
           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
           value="{{ old('email') ?? (isset($desarrollador) ? $desarrollador->email : '')}}"
           required autocomplete
    >
    @if ($errors->has('email'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
    @endif
  </div>
  <div class="form-group col-md-6">
    <label class="control-label">Teléfono</label>
    <input name="telefono" type="tel" placeholder="Número telefónico"
           class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
           value="{{ old('telefono') ?? (isset($desarrollador) ? $desarrollador->telefono : '')}}"
           required autocomplete
    >
    @if ($errors->has('telefono'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('telefono') }}</strong>
      </span>
    @endif
  </div>
</div>
<!--.form-row email telefono-->
<div class="form-group">
  <div class="checkbox icheck pt-2">
    <label>
      <input type="hidden" name="admin" value=0>
      <input
        type="checkbox"
        name="admin"
        value=1
        {{ old('admin') ?? (isset($desarrollador) ? $desarrollador->admin : '') ? 'checked' : ''}}
      >
      Administrador
    </label>
  </div>
</div>
<!--.form-group admin check -->
