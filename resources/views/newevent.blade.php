@extends('common.base')

@section('title')
新規登録
@endsection
<link rel="stylesheet" href="{{ asset('css/newcomment.css') }}">
@section('extra_css')
<style>

</style>
@endsection

@section('brand_name')
@endsection

@section('content')
<main id="app">
  <div class="container">
    @auth
      <div>
        <h3 align="center" class="mt-3">スケジュール新規登録</h3>
        <form action="{{ url()->current() }}" method="post" class="newevent-form">
          @csrf
          <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="タイトル" required>
          </div>
          <div class="form-group">
            <label for="place">場所</label>
            <input type="text" class="form-control" name="place" id="place" placeholder="場所" required>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="bigin_date">開始日時</label>
                <input type="datetime-local" class="form-control" name="bigin_date" id="bigin_date" placeholder="タイトル" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="end_date">終了日時</label>
                <input type="datetime-local" class="form-control" name="end_date" id="end_date" placeholder="タイトル" required>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <label for="is_impotant">重要マーク</label>
            <input name="is_impotant" type="hidden" value="0" />
            <input id="is_impotant" name="is_impotant" type="checkbox" value="1" />
          </div>
            <button type="submit" class="btn btn-primary btn-bg-purple">登録</button>
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
</main>
@endsection

@section('extra_javascript')
@endsection