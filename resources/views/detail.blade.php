@extends('common.base')

@section('title')
詳細
@endsection
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@section('extra_css')
<style>

  .progress-bar-left {
    margin-right: 3px;
    border-top-left-radius: 0.5em;
    border-bottom-left-radius: 0.5em;
  }

  .progress-bar-right {
    margin-left: 3px;
    border-top-right-radius: 0.5em;
    border-bottom-right-radius: 0.5em;
  }

  .gray {
    background-color: var(--bs-gray);
  }

  .red {
    background-color: var(--bs-red);
  }

  .comment-empty {
    text-align: center;
    margin-top: 100px;
  }

  .ps {
    width: {{ $per_positive }}%;
  }

  .nr {
    width: {{ $per_normal }}%;
  }

  .ng {
    width: {{ $per_negative }}%;
  }

  .margin {
    margin-top: 250px;
  }

</style>
@endsection

@section('brand_name')
@endsection

@section('content')
<main id="app">
  <div class="container">
    @if(!empty($comments))
      <div class="evaluation">
        <div class="balloon">
          <p class="balloon-code">+</p>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-left ps" data-toggle="tooltip" title="Tooltip message" role="progressbar" aria-valuenow="{{ $per_positive }}" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar gray nr" role="progressbar" aria-valuenow="{{ $per_normal }}" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar red progress-bar-right ng" role="progressbar" aria-valuenow="{{ $per_negative }}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    @else
      <div class="margin"></div>
    @endif
  </div>
  <div class="newcomment">
    <a href="{{ url('newcomment/'.$id) }}">コメントを残す</a>
  </div>
  @forelse ($comments as $comment)
    <comment
      evaluation="{{ $comment->evaluation }}"
      title="{{ $comment->title }}"
      content="{{ $comment->content }}"
      created-date="{{ $comment->created_at }}"
    ></comment>
    @empty
    <h4 class="comment-empty">コメントはありません</h4>
  @endforelse
</main>
@endsection

@section('extra_javascript')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://unpkg.com/v-tooltip"></script>
<script src="{{ asset('js/detail.js') }}"></script>
@endsection