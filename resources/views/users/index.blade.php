@extends('app')

@section('content')
<div class="container">
  <h2 class="text-primary">ユーザ一覧</h2>
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

  <p>{!! link_to('users/create', '新規作成', ['class' => 'btn btn-primary']) !!}</p>
  @if (count($users) > 0)
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">ユーザ名</th>
          <th class="text-center">メールアドレス</th>
          <th class="text-center">権限</th>
          <th class="text-center">作成日</th>
          <th class="text-center">更新日</th>
          <th class="text-center">操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td class="text-center">{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->Role->name }}</td>
          <td class="text-center">{{ $user->created_at->format('Y-m-d') }}</td>
          <td class="text-center">{{ $user->updated_at->format('Y-m-d') }}</td>
          <td class="text-center">{!! link_to('users/view/' . $user->id, '詳細', ['class' => 'btn btn-success']) !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>ユーザが存在しません。</p>
  @endif
</div>
@stop