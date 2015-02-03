@extends('layouts.nodashboard')

@section('content')
<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="box-login">
					<h3>Login met uw account</h3>
                    {{ Form::open(array('url' => '/user/login/', 'class' => 'form-login')) }}
                        @if($errors->has())
                        <div class="errorHandler alert alert-danger">
                            <ul>
                                @foreach($errors->all() AS $error)
                                <li class="fa fa-remove-sign">{{  $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
						<fieldset>
							<div class="form-group">
								<span class="input-icon">
                                    {{ Form::text('username', Input::old('username'),  array('class' => 'form-control', 'placeholder'=>'E-mail')) }}
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
                                    {{ Form::password(Input::old('password'),  array('name' => 'password', 'class' => 'form-control password', 'placeholder'=>'Uw wachtwoord')) }}
									<i class="fa fa-lock"></i>
										<a href="/user/forgot-password" class="forgot">Ik ben mijn wachtwoord vergeten</a>
										</span>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-green pull-right">
									Inloggen <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
                    {{ Form::close() }}
				
				</div>
				<!-- end: LOGIN BOX -->
</div>
@stop