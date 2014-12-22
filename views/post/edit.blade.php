@extends('layouts.main')
@section('content')

<div class="span9">
    <div class="row-fluid">
        <div class="span3"></div>
        <div class="span6">

            {{ Form::open(array('url' => URL::action('PostController@edit',array('id'=>$post_item->tid)),'class'=>'form-horizontal')) }}
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
                            <input name="title" placeholder="请写明时间..." class="input-xlarge" type="text" value="{{ $post_item->title }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">总结类型：</label>
                        <div class="controls">

                            <!-- Inline Radios -->
                            <label class="radio inline">
                                <input value="1" checked="checked" name="group" type="radio">
                                每日总结
                            </label>
                            <label class="radio inline">
                                <input value="2" name="group" type="radio">
                                月度总结
                            </label>
                            <label class="radio inline">
                                <input value="3" type="radio">
                                年度总结
                            </label>
                        </div>
                    </div><div class="control-group">

                        <!-- Textarea -->
                        <label class="control-label">内容：</label>
                        <div class="controls">
                            <div class="textarea">
                                <textarea name="content" type="" class="input-xxlarge" rows="10">{{ $post_item->content }} </textarea>
                            </div>
                        </div>
                    </div>

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