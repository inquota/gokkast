@extends('layouts.nodashboard')

@section('content')
<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">

				<!-- start: FORGOT BOX -->
				<div class="box-forgot">
					<h3>Wactwoord vergeten?</h3>
					<p>
						Vul uw gebruikersnaam in voor het opvragen van een nieuw wachtwoord.
					</p>
                    {{ Form::open(array('url' => '/user/forgot-password', 'class' => 'form-forgot')) }}
                        @if($errors->has())
                        <div class="errorHandler alert alert-danger">
                            <ul>
                                @foreach($errors->all() AS $error)
                                <li class="fa fa-remove-sign">{{  $error }}</li>
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
						<fieldset>
							<div class="form-group">
								<span class="input-icon">
									{{ Form::text('username', Input::old('username'),  array('class' => 'form-control', 'placeholder'=>'E-mail')) }}
									<i class="fa fa-envelope"></i> </span>
							</div>
							<div class="form-actions">
								<a class="btn btn-light-grey" href="/user/login">
									<i class="fa fa-chevron-circle-left"></i> Inloggen
								</a>
								<button type="submit" class="btn btn-green pull-right">
									Opvragen <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
                    {{ Form::close() }}
					<!-- start: COPYRIGHT -->
					<div class="copyright">
						2014 &copy; <a href="http://www.inquota.nl/" target="_blank">Inquota</a> &amp; <a href="http://www.exdeliver.nl/" target="_blank">EXdeliver V.O.F.</a>
					</div>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: FORGOT BOX -->
			</div>
</div>
@stop