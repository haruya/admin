@extends('app')

@section('content')
<div class="container">
  <ul class="breadcrumb">
    <li>{!! link_to('/users', 'ユーザ一覧') !!}</li>
    <li class="active">ユーザ詳細</li>
  </ul>
  <h2 class="text-primary">ユーザ詳細</h2>
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
  <table class="table table-bordered table-hover">
    <tr>
      <th class="success">ID</th>
      <td>{{ $user->id }}</td>
    </tr>
    <tr>
      <th class="success">ユーザ名</th>
      <td>{{ $user->name }}</td>
    </tr>
    <tr>
      <th class="success">メールアドレス</th>
      <td>{{ $user->email }}</td>
    </tr>
    <tr>
      <th class="success">パスワード</th>
      <td>【非公開】</td>
    </tr>
    <tr>
      <th class="success">権限</th>
      <td>{{ $user->Role->name }}</td>
    </tr>
    <tr>
      <th class="success">作成日</th>
      <td>{{ $user->created_at->format('Y-m-d') }}</td>
    </tr>
    <tr>
      <th class="success">更新日</th>
      <td>{{ $user->updated_at->format('Y-m-d') }}</td>
    </tr>
  </table>
  <div class="pull-right">
    {!! link_to('users/update/' . $user->id, '編集', ['class' => 'btn btn-warning']) !!}&nbsp;
    <a href="#" data-toggle="modal" data-target="#deleteModal{{ $user->id }}" class="btn btn-danger">削除</a>
  </div>
</div>
<!-- modal -->
<div class="modal fade" id="deleteModal{{ $user->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>ユーザ削除</h4>
      </div>
      <div class="modal-body">
        <p>本当に削除してもよろしいですか？</p>
      </div>
      <div class="modal-footer">
        {!! Form::open(['action' => 'UsersController@postDelete']) !!}
          {!! Form::hidden('id', $user->id, ['id' => 'userId']) !!}
          {!! Form::hidden('auth_id', Auth::user()->id, ['id' => 'authId']) !!}
          <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
          {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@stop