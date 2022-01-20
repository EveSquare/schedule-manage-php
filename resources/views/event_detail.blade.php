@extends('common.base')

@section('title')
@endsection

@section('extra_css')
<link rel="stylesheet" href="{{ asset('css/newcomment.css') }}">
<style>

  .form-header form {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .form-header h3 {
    margin-left: 20px;
  }

  .newevent-form input[type="submit"] {
    display: block;
    margin: 0 auto;
    margin-top: 20px;
  }

</style>
@endsection

@section('brand_name')
@endsection

@section('content')
<div class="container">
    @auth
      <div>
        <div class="form-header">
          <form action="{{ url()->current() }}" method="post" class="newevent-form">
            @csrf
            <h3 align="center" class="mt-3">スケジュール編集</h3>
            <input type="submit" class="btn btn-danger del-btn" name="del" value="削除"></input>
          </form>
        </div>
        <form action="{{ url()->current() }}" method="post" class="newevent-form">
          @csrf
          <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" value="{{ $events->title }}" class="form-control" name="title" id="title" placeholder="タイトル" required>
          </div>
          <div class="form-group">
            <label for="place">場所</label>
            <input type="text" value="{{ $events->place }}" class="form-control" name="place" id="place" placeholder="場所" required>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="bigin_date">開始日時</label>
                <input type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime($events->bigin_date)) }}" class="form-control" name="bigin_date" id="bigin_date" placeholder="タイトル" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="end_date">終了日時</label>
                <input type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime($events->end_date)) }}" class="form-control" name="end_date" id="end_date" placeholder="タイトル" required>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <label for="is_impotant">重要マーク</label>
            <input type="checkbox" value="{{ $events->is_impotant }}" name="is_impotant" id="is_impotant">
          </div>
          <input type="submit" class="btn btn-primary btn-bg-purple" name="update" value="更新"></input>
        </form>
      </div>
      @else
      <div class="then-login">
        <h4>イベントを追加にはログインが必要です</h4>
        @if (Route::has('login'))
          <a href="{{ route('login') }}" class="btn btn-secondary">ログイン</a>
        @endif
        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="btn btn-primary btn-bg-purple">アカウント作成</a>
        @endif
      </div>
    @endif
  </div>
@endsection

@section('extra_javascript')
@endsection