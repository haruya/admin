@extends('app')

@section('content')
<div class="container">
  <ul class="breadcrumb">
    <li>{!! link_to('/users', 'ユーザ一覧') !!}</li>
    <li class="active">ユーザ追加</li>
  </ul>
  <h2 class="text-primary">ユーザ追加</h2>
  @if (Session::has('flash_message'))
    <!-- フラッシュメッセージの表示 -->
    <p id="flash_message" class="alert alert-success">{{ Session::get('flash_message') }}</p>
  @endif

  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {!! Form::open() !!}
    <div class="form-group">
      {!! Form::label('name', 'ユーザ名', ['class' => 'control-label']) !!}
      {!! Form::text('name', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('email', 'メールアドレス', ['class' => 'control-label']) !!}
      {!! Form::email('email', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('password', 'パスワード', ['class' => 'control-label']) !!}
      {!! Form::input('password', 'password', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('password_confirmation', 'パスワード確認', ['class' => 'control-label']) !!}
      {!! Form::input('password', 'password_confirmation', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('role_id', '権限', ['class' => 'control-label']) !!}
      {!! Form::select('role_id', $roles, '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}&nbsp;
      <a href="#" data-toggle="modal" data-target="#role" class="btn btn-warning">権限の新規作成</a>
    </div>
  {!! Form::close() !!}
</div>
<!-- modal -->
<div class="modal fade" id="role">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title alert alert-success">権限の作成</h4>
      </div>
      {!! Form::open(['action' => 'UsersController@postRoleCreate', 'id' => 'roleForm']) !!}
      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('name', '権限名', ['class' => 'control-label']) !!}
          {!! Form::text('name', '', ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
        <input type="button" id="roleSubmit" class="btn btn-primary" value="作成" />
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop