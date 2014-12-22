@extends('layouts.nodashboard')

@section('content')
<div class="verticalcenter">

    <div class="panel panel-primary">
        <div class="panel-body">
            <a href="http://www.wom-marketing.nl" target="_blank"><img src="/images/Logo-Amiz-200x189.png" alt="Logo" class="brand"></a>
                {{ Form::open(array('url' => '/user/login/')) }}
                @if($errors->has())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() AS $error)
                        <li>{{  $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {{ Form::text('username', Input::old('username'),  array('class' => 'form-control', 'placeholder'=>'E-mail')) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            {{ Form::password(Input::old('password'),  array('name' => 'password', 'class' => 'form-control', 'placeholder'=>'Uw wachtwoord')) }}
                        </div>
                    </div>
                </div>


        </div>
        <div class="panel-footer">
            <a href="/user/forgot-password" class="pull-left btn btn-link" style="padding-left:0">Wachtwoord vergeten?</a>

            <div class="pull-right">
                {{ Form::submit('Inloggen', array('class' => 'btn btn-primary form-control')) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop