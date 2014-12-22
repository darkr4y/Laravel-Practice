@extends('layouts.main')
@section('content')

<div class="span9">
    <div class="row-fluid">
        <div class="span3"></div>
        <div class="span6">

            {{ Form::open(array('url' => URL::action('MemoController@sub_edit',array('id'=>$subdomain_item->id)),'class'=>'form-horizontal')) }}
            <fieldset>
                <div id="legend" class="">
                    <legend class="">正在为[ {{ $subdomain_item->sitename}} ]添加子域名备忘</legend>
                </div>
                @foreach ($errors->all() as $message)
                <div class="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> {{ $message }}
                </div>
                @endforeach
                <div class="control-group">

                    <!-- Text input-->
                    <label class="control-label" for="input01">子域站点标题：</label>
                    <div class="controls">
                        <input name="sitename" placeholder="请填写中文全称..." class="input-xlarge" type="text" value="{{ $subdomain_item->sitename }}">
                    </div>
                </div>
                <div class="control-group">

                    <!-- Text input-->
                    <label class="control-label" for="input01">子域站点URL：</label>
                    <div class="controls">
                        <input name="url" placeholder="请填写URL..." class="input-xxlarge" type="text" value="{{ $subdomain_item->url }}">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">类型：</label>
                    <div class="controls">

                        <!-- Inline Radios -->
                        <label class="radio inline">
                            <input value="4" checked="checked" name="group" type="radio">
                            外网
                        </label>
                        <label class="radio inline">
                            <input value="5" name="group" type="radio">
                            内网
                        </label>
                    </div>
                </div>

                <div class="control-group">

                    <!-- Text input-->
                    <label class="control-label" for="input01">Web服务器版本：</label>
                    <div class="controls">
                        <input name="webserver" placeholder="Apache/2.4.7 (Ubuntu) Server at localdev Port 80" class="input-xxlarge" type="text" value="{{ $subdomain_item->webserver }}">
                    </div>
                </div>



                <div class="control-group">

                    <!-- Text input-->
                    <label class="control-label" for="input01">操作系统版本：</label>
                    <div class="controls">
                        <input name="system" placeholder=" Microsoft Windows Server 2008 R2 Enterprise  6.1.7601 Service Pack 1 Build 7601" class="input-xxlarge" type="text" value="{{ $subdomain_item->system }}">
                    </div>
                </div>



                <div class="control-group">

                    <!-- Text input-->
                    <label class="control-label" for="input01">当前所有权限：</label>
                    <div class="controls">
                        <input name="priv" placeholder="" class="input-xxlarge" type="text" value="{{ $subdomain_item->priv }}">
                    </div>
                </div>
                <div class="control-group">

                    <!-- Text input-->
                    <label class="control-label" for="input01">突破点：</label>
                    <div class="controls">
                        <input name="breakpoint" placeholder="SQL注入、上传、命令执行、本地包含、各类中间件漏洞..." class="input-xxlarge" type="text" value="{{ $subdomain_item->breakpoint }}">
                    </div>
                </div>
                <div class="control-group">

                    <!-- Text input-->
                    <label class="control-label" for="input01">控制方法：</label>
                    <div class="controls">
                        <input name="controlmethod" placeholder="webshell、backdoor、rootkit" class="input-xlarge" type="text" value="{{ $subdomain_item->controlmethod }}">
                    </div>
                </div>


                <div class="control-group">

                    <!-- Textarea -->
                    <label class="control-label">备注：</label>
                    <div class="controls">
                        <div class="textarea">
                            <textarea name="mark" type="" class="input-xxlarge" rows="10"> {{ $subdomain_item->mark }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="control-group">

                    <!-- Button -->
                    <div class="controls">
                        <button name="editnew" value="submit" class="btn btn-success">记录</button>
                        <a href="{{ URL::action('MemoController@sub_view', array('id'=>$subdomain_item->id)) }}" class="btn">返回</a>
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