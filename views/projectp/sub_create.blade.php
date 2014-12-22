@extends('layouts.main')
@section('content')

<div class="span9">
    <div class="row-fluid">
        <div class="span3"></div>
        <div class="span6">

            {{ Form::open(array('url' => URL::action('ProgressController@sub_create',array('id'=>$progress_item->pid)),'class'=>'form-horizontal')) }}
                <fieldset>
                    <div id="legend" class="">
                        <legend class="">正在为[ {{ $progress_item->title }} ]添加新进度</legend>
                    </div>
                    @foreach ($errors->all() as $message)
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                    @endforeach
                    <div class="control-group">

                        <!-- Textarea -->
                        <label class="control-label">今天是开启项目后的第</label>
                        <div class="controls" style="padding-top: 5px;">
                            <font color="blue"><strong>{{ $timediff }}</strong></font> 天
                        </div>
                    </div>

                    <div class="control-group">

                        <!-- Textarea -->
                        <label class="control-label">内容：</label>
                        <div class="controls">
                            <div class="textarea">
                                <textarea name="content" type="" class="input-xxlarge" rows="10"> </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">

                        <!-- Button -->
                        <div class="controls">
                            <button name="addnew" value="submit" class="btn btn-success">记录</button>

                            <a href="{{ URL::action('ProgressController@view', array('id'=>$progress_item->pid)) }}" class="btn">返回</a>
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