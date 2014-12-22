@extends('layouts.nodashboard')

@section('content')
<div class="verticalcenter">

    <div class="panel panel-primary">
        <div class="panel-body">
            <a href="http://www.wom-marketing.nl" target="_blank"><img src="/images/Logo-Amiz-200x189.png" alt="Logo" class="brand"></a>
                {{ Form::open(array('url' => '/user/set-password/'.$secret, 'id' => 'forgotmypass')) }}
                            @if(isset($requested) && $requested == 1)
                                <div class="alert alert-success marginedfp">
                                <p>Uw wachtwoord is opgeslagen.</p>
                                </div>
                            @else
                                <div class="alert alert-info text-center marginedfp">
                                <p>Bent u uw <b>wachtwoord vergeten?</b><br />
                                Stel hier uw nieuwe wachtwoord in.</p>
                                </div>
                            @endif
                @if($errors->has())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() AS $error)
                        <li>{{  $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                                            @if(Session::get('emptyuser'))
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <li>{{ Session::get('emptyuser')}}</li>
                                                </ul>
                                            </div>
                                            @endif

                                            @if(Session::get('confirmed'))
                                            <div class="alert alert-success">
                                                <ul>
                                                    <li>Uw wachtwoord is zojuist gewijzigd!</li>
                                                </ul>
                                            </div>
                                            @endif

                            @if(isset($usernotfound) && $usernotfound == 1)
                            <div class="alert alert-warning marginedfp">
                                                                             <ul>
                                                                                    <li>De gebruiker met de bijbehorende herstel code is niet gevonden.<br />
                                                                                    Kopieer eventueel de gehele code vanuit uw mail en plak deze in uw adresbalk.</li>
                                                                                    </ul>
                            </div>
                            @endif
                <div class="form-group">
                    <div class="col-sm-12">
                                                <b>Wachtwoord instellen voor: {{ $user->username }}</b><br /><br />
                                                @if(!Session::get('confirmed'))
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {{ Form::text('password', Input::old('password'),  array('id' => 'password', 'class' => 'form-control', 'placeholder'=>'Uw nieuwe wachtwoord')) }}
                            {{ Form::text('password_confirmation', Input::old('password_confirmation'),  array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder'=>'Uw nieuwe wachtwoord herhalen')) }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">

                        </div>
                    </div>
                </div>
        </div>
        <div class="panel-footer">
            <a href="/" class="pull-left btn btn-link" style="padding-left:0">Ga terug naar inloggen</a>

            <div class="pull-right">
            @if(!Session::get('confirmed'))
                {{ Form::submit('Wachtwoord opslaan', array('class' => 'btn btn-primary form-control')) }}
                @endif
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop