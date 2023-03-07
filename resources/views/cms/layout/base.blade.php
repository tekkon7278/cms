<!DOCTYPE html>
<html>
  <head>
    @vite([
      'resources/scss/base.scss',
      'resources/css/modal.css',
      'resources/js/bootstrap.js',
      'resources/js/app.js'
    ])
    <title>@yield('title')</title>
  </head>
  <body>
    <header>
      <h1>@yield('h1Title')</h1>
    </header>
  
    <div class="main" id="app">
      @yield('main')
    </div>

    <footer>
    </footer>
  </body>
</html>