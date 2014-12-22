@extends('layouts.main')
@section('content')

<div class="span9">
    <div class="row-fluid">
        <div class="span3"></div>
        <div class="span6">

            {{ Form::open(array('url' => URL::action('ProgressController@edit',array('id'=>$progress_item->pid)),'class'=>'form-horizontal')) }}
                <fieldset>
                    <div id="legend" class="">
                        <legend class="">写总结</legend>
                    </div>
                    @foreach ($errors->all() as $message)
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                    @endforeach
                    <div class="control-group">

                        <!-- Text input-->
                        <label class="control-label" for="input01">标题：</label>
                        <div class="controls">
                            <input name="title" placeholder="请写明时间..." class="input-xlarge" type="text" value="{{ $progress_item->title }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">预计完成时间：</label>
                        <div class="controls">
                            <div class="input-append">
                                <input name="days" class="span3" name="days" type="text" value="{{ $progress_item->days }}">
                                <span class="add-on"> 天</span>
                            </div>
                            10天、30天、60天可选
                        </div>
                    </div>
                    <div class="control-group">

                        <!-- Textarea -->
                        <label class="control-label">内容：</label>
                        <div class="controls">
                            <div class="textarea">
                                <textarea name="content" type="" class="input-xxlarge" rows="10">{{ $progress_item->content }} </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">

                        <!-- Button -->
                        <div class="controls">
                            <button name="editnew" value="submit" class="btn btn-success">修改</button>
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