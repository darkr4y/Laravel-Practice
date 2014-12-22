@extends('layouts.main')
@section('content')

<div class="span9">
    <div class="row-fluid">
        <div class="span3"></div>
        <div class="span6">

            {{ Form::open(array('url' => URL::action('UserController@update'),'class'=>'form-horizontal')) }}
                <fieldset>
                    <div id="legend" class="">
                        <legend class="">修改密码</legend>
                    </div>
                    @foreach ($errors->all() as $message)
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                    @endforeach
                    <div class="control-group">

                        <!-- Text input-->
                        <label class="control-label" for="input01">原密码：</label>
                        <div class="controls">
                            <input name="originpwd" placeholder="..." class="input-xlarge" type="password" >
                        </div>
                    </div>
                    <div class="control-group">

                        <!-- Text input-->
                        <label class="control-label" for="input01">新的密码：</label>
                        <div class="controls">
                            <input name="newpwd" placeholder="..." class="input-xlarge" type="password" >
                        </div>
                    </div>
<!--                    <div class="control-group">-->
<!--                        <label class="control-label" for="input01">密码确认：</label>-->
<!--                        <div class="controls">-->
<!--                            <input name="newpwdconfirm" placeholder="..." class="input-xlarge" type="text" >-->
<!--                        </div>-->
<!--                    </div>-->



                    <div class="control-group">

                        <!-- Button -->
                        <div class="controls">
                            <button name="editnew" value="submit" class="btn btn-success">修改</button>
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