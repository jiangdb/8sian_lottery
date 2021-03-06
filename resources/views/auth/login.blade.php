@extends('layouts.app')

@section('content')
<div class="container">
    <div class="message_box">
        @if (Session::has('message'))
                <!-- will be used to show any messages -->
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="message_box">
                        @if (Session::has('error'))
                            <!-- will be used to show any messages -->
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">姓名</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} hidden">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="123456" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('poker') ? ' has-error' : '' }}">
                            <label for="poker" class="col-md-4 control-label">扑克</label>

                            <div class="col-md-6">
                                <select name="poker_size" class="form-control poker-size" required>
                                        <option value ="">请选择花色</option>
                                        <option value ="0">草花♣️</option>
                                        <option value ="1">红心♥️</option>
                                        <option value="2">黑桃♠️</option>
                                        <option value="3">方块♦️</option>
                                        <option value="53">大王</option>
                                        <option value="54">小王</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="poker_number" class="form-control" required>
                                        <option value="0">请选择牌号</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">J</option>
                                        <option value="12">Q</option>
                                        <option value="13">K</option>
                                        <option value="1">A</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
