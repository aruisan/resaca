<div class="form-group">
    {!! Form::label('nombre', 'nombre', ['for' => 'nombre'] ) !!}
    {!! Form::text('nombre', null , ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'el nombre del elemento' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('descripcion', 'descripcion', ['for' => 'descripcion'] ) !!}
    {!! Form::text('descripcion', null , ['class' => 'form-control', 'id' => 'descripcion', 'placeholder' => 'Escribe descripcion' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('serial', 'serial', ['for' => 'serial'] ) !!}
    {!! Form::text('serial', null , ['class' => 'form-control', 'id' => 'serial', 'placeholder' => 'Serial Institucional del Elemento' ]  ) !!}
</div>


