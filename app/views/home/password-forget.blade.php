@extends('layouts.nodashboard')

@section('content')
<div class="verticalcenter">

    <div class="panel panel-primary">
        <div class="panel-body">
            <a href="http://www.wom-marketing.nl" target="_blank"><img src="/images/Logo-Amiz-200x189.png" alt="Logo" class="brand"></a>
                {{ Form::open(array('url' => '/user/forgot-password', 'id' => 'forgotmypass')) }}
                            @if(isset($requested) && $requested == 1)
                                <div class="alert alert-success marginedfp">
                                <p>Er is een uitnodiging verstuurd naar uw email adres.<br />
                                Controleer voor de zekerheid ook uw ongewenste mail.</p>
                                </div>
                            @else
                                <div class="alert alert-info text-center marginedfp">
                                <p>Bent u uw <b>wachtwoord vergeten?</b><br />
                                Vul hieronder uw gebruikersnaam in. Wij sturen u een uitnodiging om uw wachtwoord te wijzigen.</p>
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

                            @if(isset($usernotfound) && $usernotfound == 1)
                            <div class="alert alert-warning marginedfp">
                                                                             <ul>
                                                                                    <li>De door u opgegeven gebruikersnaam is niet bij ons bekend.</li>
                                                                                    </ul>
                            </div>
                            @endif
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            @if(isset($requested) && $requested == 1)

                            @else
                            {{ Form::text('email', Input::old('email'),  array('id' => 'username', 'class' => 'form-control', 'placeholder'=>'Gebruikersnaam')) }}
                            @endif
                        </div>
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
                            @if(isset($requested) && $requested == 1)

                            @else
                {{ Form::submit('Wachtwoord opvragen', array('class' => 'btn btn-primary form-control')) }}
                @endif
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop