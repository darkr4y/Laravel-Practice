@extends('layouts.main')
@section('content')

<div class="span9">
    <div class="row-fluid">
        <div class="span3"></div>
        <div class="span6">

            {{ Form::open(array('url' => URL::action('ProgressController@sub_edit',array('id'=>$subprogress_item->sid)),'class'=>'form-horizontal')) }}
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

                    <!-- Textarea -->
                    <label class="control-label">内容：</label>
                    <div class="controls">
                        <div class="textarea">
                            <textarea name="content" type="" class="input-xxlarge" rows="10">{{ $subprogress_item->content }} </textarea>
                        </div>
                    </div>
                </div>

                <div class="control-group">

                    <!-- Button -->
                    <div class="controls">
                        <button name="editnew" value="submit" class="btn btn-success">修改</button>
                        <a href="#" onclick="window.history.go(-1)" class="btn">返回</a>
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