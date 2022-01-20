<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>スケジュール管理 @yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/number.css') }}">
  @yield('extra_css')
</head>
<body>
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

  @yield('content')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  @yield('extra_javascript')
</body>
</html>