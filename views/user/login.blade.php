@layout('layouts.main')
@section('content')
<div class="row-fluid">
    <div class="span4"></div>


    <div class="span4">
        {{ Form::open(array('url' => 'login','class'=>'form-horizontal')) }}

            <fieldset>
                <div id="legend" class="">
                    <legend class="">请先登陆</legend>
                </div>
                <div class="control-group">

                    <!-- Text input-->
                    <label class="control-label" for="input01">用户名：</label>
                    <div class="controls">
                        <input name="username" placeholder="someone@somedomain.com" class="input-xlarge" type="text">
                        <p class="help-block">以Email作为用户名</p>
                    </div>
                </div>

                <div class="control-group">

                    <!-- Appended checkbox -->
                    <label class="control-label">密码：</label>
                    <div class="controls">
                        <div class="input-append">
                            <input name="password" class="input-xlarge" placeholder="no sqli here ..." type="password">
                      <span class="add-on">
                        <label class="checkbox" for="appendedCheckbox">
                            <input name="autologin" value="true" class="" type="checkbox">
                        </label>
                      </span>
                        </div>
                        <p class="help-block">勾选Checkbox以自动登陆</p>
                    </div>
                </div>

                <div class="control-group">

                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-success">进入</button>
                    </div>
                </div>

            </fieldset>

        {{ Form::close() }}
    </div>

    <div class="span4"></div>

</div>
@stop