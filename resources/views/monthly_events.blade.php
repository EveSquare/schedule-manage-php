<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>月間スケジュール</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.min.js"></script>
<style>

  a {
    color: var(--purple);
  }

  #calendar {
    margin-top: 100px;
  }

</style>
<script>

  function formatDate(dt) {
    var y = dt.getFullYear();
    var m = ('00' + (dt.getMonth()+1)).slice(-2);
    var d = ('00' + dt.getDate()).slice(-2);
    return (y + '-' + m + '-' + d);
  }

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      //timeZone: 'Asia/Tokyo',
      initialView: 'dayGridMonth',
      locale: 'ja',
      defaultDate: formatDate(new Date()),
      businessHours: true,
      eventTimeFormat: { hour: 'numeric', minute: '2-digit' },
      events: @json($result),
    });
    calendar.render();
  });

</script>
</head>
<body>
<div class="conteiner">
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">スケジュール管理 @yield('brand_name')</a>
        @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 sm:block">
            @else
              <a href="{{ route('login') }}" class="btn btn-secondary">ログイン</a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary btn-bg-purple">アカウント作成</a>
              @endif
          </div>
        @endif
      </div>
    </nav>
  </header>
  <div id='calendar'></div>
</div>
</body>
</html>