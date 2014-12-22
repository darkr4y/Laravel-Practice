@extends('layouts.main')
@section('content')

<div class="span9">
    <div class="row-fluid">
        <div class="span3"></div>
        <div class="span6">

            {{ Form::open(array('url' => URL::action('AdminController@createuser'),'class'=>'form-horizontal')) }}
                <fieldset>
                    <div id="legend" class="">
                        <legend class="">添加用户</legend>
                    </div>
                    @foreach ($errors->all() as $message)
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                    @endforeach
                    <div class="control-group">

                        <!-- Text input-->
                        <label class="control-label" for="input01">用户名：</label>
                        <div class="controls">
                            <input name="username" placeholder="请使用email格式" class="input-xlarge" type="text" >
                        </div>
                    </div>
                    <div class="control-group">

                        <!-- Text input-->
                        <label class="control-label" for="input01">密码：</label>
                        <div class="controls">
                            <input name="password" placeholder="请使用email格式" class="input-xlarge" type="password" >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">用户类型：</label>
                        <div class="controls">

                            <!-- Inline Radios -->
                            <label class="radio inline">
                                <input value="０" checked="checked" name="group" type="radio">
                                普通用户
                            </label>
                            <label class="radio inline">
                                <input value="１" name="group" type="radio">
                                管理员
                            </label>
                        </div>
                    </div>

                    <div class="control-group">

                        <!-- Button -->
                        <div class="controls">
                            <button name="addnew" value="submit" class="btn btn-success">添加</button>
                        </div>
                    </div>

                </fieldset>

            {{ Form::close() }}

        </div>
        <div class="span3"></div>
    </div>
</div>

@stop

@section('sidebar')
    @include('layouts.sider')
@stop