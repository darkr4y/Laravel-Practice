<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-9-15
 * Time: 下午3:55
 */
?>
@layout('layouts.main')
@section('content')

<div class="span9">

    <div class="row-fluid">
        <div class="span12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>标题</th>
                    <th>最后修改时间</th>
                    <th>作者</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($progress_list as $progress_item)
                <tr>
                    <td>{{ $progress_item->pid }}</td>
                    <td><a href="{{ URL::action('ProgressController@view', array('id'=>$progress_item->pid)) }}">{{ $progress_item->title }}</a></td>
                    <td>{{ date( 'Y-m-d H:i:s' , $progress_item->last_change) }}</td>
                    <td>{{ $progress_item->author->email }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span9"></div>
        <div class="span3">
            {{ $progress_list->links() }}
        </div>

    </div>
</div>

@stop

@section('sidebar')
    @include('layouts.sider')
@stop