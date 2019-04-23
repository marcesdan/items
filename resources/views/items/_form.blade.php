<input type="hidden" name="id" value=" {{ isset($proyecto) ? $proyecto->id : ''}} ">
<div class="form-row">
  <div class="form-group col-md-12">
    <label class="control-label">Nombre <b>*</b></label>
    <input
      name="nombre" type="text" placeholder="Nombre"
      class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}"
      value="{{ old('nombre') ?? (isset($proyecto) ? $proyecto->nombre : '')}}"
      required autocomplete autofocus
    >
    @if ($errors->has('nombre'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('nombre') }}</strong>
      </span>
    @endif
  </div>
</div>
<!--.form-row nombre-->
<div class="form-row">
  <div class="form-group col-md-12">
    <label class="control-label">Descripcion</label>
    <textarea
      name="descripcion" placeholder="Descripción del proyecto"
      class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
    >{{ old('descripcion') ?? (isset($proyecto) ? $proyecto->descripcion : '')}}</textarea>
    @if ($errors->has('descripcion'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('descripcion') }}</strong>
      </span>
    @endif
  </div>
</div>
<!--.form-row descripcion-->
<div class="form-row">
  <div class="form-group col-md-12">
    <label class="control-label">Líder del proyecto <b>*</b></label>
    <select id="lider-select" class="form-control custom-select {{ $errors->has('lider') ? ' is-invalid' : '' }}" name="lider">
      <option value="{{ old('lider') ?? (isset($proyecto) ? $proyecto->lider->id : '' )}}">
        {{  old('lider') ? $desarrolladores[old('lider')]->full_name : isset($proyecto) ? $proyecto->lider->full_name : '' }}
      </option>
      @foreach($desarrolladores as $desarrollador)
        <option value="{{$desarrollador->id}}">{{$desarrollador->full_name}}</option>
      @endforeach
    </select>
    @if ($errors->has('lider'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('lider') }}</strong>
      </span>
    @endif
  </div>
</div>
<!--.form-row lider-->
<div class="form-row">
  <div class="form-group col-md-12">
    <label class="control-label">Fecha estimada</label>
    <input
      name="fecha_estimada" type="date" placeholder="Fecha"
      class="form-control{{ $errors->has('fecha_estimada') ? ' is-invalid' : '' }}"
      value="{{ old('fecha_estimada') ?? (isset($proyecto) ? $proyecto->fecha_estimada : '')}}"
      autocomplete
    >
    @if ($errors->has('fecha_estimada'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('fecha_estimada') }}</strong>
      </span>
    @endif
  </div>
</div>
<!--.form-row lider-->

@push('before-body-close')
  <script>
    $(function () {
      $("#lider-select").select2();
    });
  </script>
@endpush()




