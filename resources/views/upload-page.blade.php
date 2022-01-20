@extends('common.base')

@section('title')
@endsection

@section('extra_css')
<style>

  .file-upload-form {
    margin-top: 250px;
  }

  .btn-center {
    margin-top: 30px;
    text-align: center;
  }

</style>
@endsection

@section('brand_name')
@endsection

@section('content')
<div class="container">
  <form action="{{ url('upload/') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="file-upload-form">
      <label for="file">画像をアップロード(2Mbまで)</label>
      <input type="file" class="form-control-file" id="file" name="image" accept="image/png, image/jpeg">
    </div>
    <div class="btn-center">
      <button type="submit" class="btn btn-primary">アップロード</button>
    </div>
  </form>
</div>
@endsection

@section('extra_javascript')
@endsection