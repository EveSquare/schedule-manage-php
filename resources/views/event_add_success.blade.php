@extends('common.base')

@section('title')
@endsection

@section('extra_css')
<style>
  .content-center {
    text-align: center;
  }

  .btn-center {
    margin: 0 auto;
    display: table;
  }
</style>
@endsection

@section('brand_name')
@endsection

@section('content')
<h4 style="margin-top: 300px;" class="content-center">イベントの書き込みに成功しました。</h4>
<a href="{{ url('/') }}" class="btn btn-primary btn-center btn-bg-purple">ホームに戻る</a>
@endsection

@section('extra_javascript')
@endsection