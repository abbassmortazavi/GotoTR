@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Verify Your Code</h3>
                    @if($errors->count() > 0)
                        <div class="alert">
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach

                        </div>
                    @endif
                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">A fresh verification link has been sent to
                                your Mobile
                            </div>
                        @endif
                            <form method="post" action="{{ url('/checkCode') }}">
                                @csrf

                                <div class="form-group has-feedback{{ $errors->has('code') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="code" value="{{ old('code') }}" placeholder="Full Name">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                                    @if ($errors->has('code'))
                                        <span class="help-block">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                                    @endif
                                </div>

                                <div class="form-group has-feedback">
                                    <input type="hidden" class="form-control" name="tell" value="{{ $checkMobile }}">
                                </div>
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Send</button>
                                </div>
                            </form>
                        <a href="{{ route("code.resendCode")."?tell={$checkMobile}" }}">click here to request another'</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
