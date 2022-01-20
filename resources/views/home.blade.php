@extends('common.base')

@section('extra_css')
<style>

    .head-btn {
        margin-top: 80px;
    }

    .head-btn a{
        margin-left: 10px;
    }

    .events {
        list-style: none;
        font-size: 18pt;
        font-weight: 220;
        margin-top: 30px;
    }

    .events li {
        margin-bottom: 10px;
        color: var(--bs-gray-dark);
    }

    .events li a {
        text-decoration: none;
        color: var(--bs-gray-dark);
    }

    .events li a:hover {
        color: var(--purple);
    }

    .events .top-event::before {
        content: "";
        position: absolute;
        height: 40px;
        width: 5px;
        background-color: var(--purple);
        margin-left: -10px;
    }

    .important::after {
        content: "重要";
        margin-left: 5px;
        color: red;
        border:1px solid red;
        border-radius: 0.5em;
        padding: 1px 3px;
        font-size:12px;
    }

</style>
@endsection('extra_css')

@section('content')

<main class='container'>
<!-- <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form> -->
    <div class="head-btn">
        <a href="{{ url('/newevent') }}" class="btn btn-outline-primary col-purple">新規登録</a>
        <a href="{{ url('/monthly_events') }}" class="btn btn-outline-primary col-purple">月間スケジュール</a>
        <a href="{{ url('/weekly_events') }}" class="btn btn-outline-primary col-purple">週間スケジュール</a>
    </div>
    <ul class="events">
        @forelse ($events as $event)
            @if ($loop->first)
            <li class="top-event {{ $event->is_impotant ? 'important': '' }}"><a href="{{ url('/event_detail') }}/{{ $event->id }}">{{ $event->bigin_date }} {{ $event->title }} {{ $event->place }}</a></li>
            @else
            <li class="{{ $event->is_impotant ? 'important': '' }}"><a href="{{ url('/event_detail') }}/{{ $event->id }}">{{ $event->bigin_date }} {{ $event->title }} {{ $event->place }}</a></li>
            @endif
        @empty
        <li>イベントはまだ作成されていません</li>
        @endforelse
    </ul>
</main>

@endsection('content')


@section('extra_javascript')
@endsection