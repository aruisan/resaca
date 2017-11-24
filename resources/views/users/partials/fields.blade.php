<div class="form-group">
    {!! Form::label('name', 'nombre completo', ['for' => 'nombre'] ) !!}
    {!! Form::text('name', null , ['class' => 'form-control', 'placeholder' => 'Nombre completo del usuario' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'correo electronico', ['for' => 'email'] ) !!}
    {!! Form::text('email', null , ['class' => 'form-control', 'placeholder' => 'Email del usuario' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'password', ['for' => 'password'] ) !!}
     {!! Form::password('password', ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'confirmar password', ['for' => 'password_confirmation'] ) !!}
    {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
</div>


