<html>
<head>
  <title>Sri Ram Plastic</title>
  <link rel = "stylesheet" href="/css/app.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
  @include('inc.navbar')
  <div class='container'>
    @if(Request::is('/'))
      @include('inc.showcase')
    @endif
    <div class='row'>
      <div class = 'col-md-10 col-lg-10 col-sm-10' >
        @include('inc.messages')
        @yield('content')
      </div>
      <div class = 'col-md-2 col-lg-2 col-sm-2' >
        @include('inc.sidebar')
      </div>
    </div>
  </div>
  <footer id="footer" class="text-center">
    <P>Copyright 2019 &copy; Karthika</p>
</body>
</html>
