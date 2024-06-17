<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Job Portal</a>
  
        <!-- Navbar content -->
        <div class="ml-auto">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home </a>
            </li>
             @if (!Auth::check())  
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>  
            <li class="nav-item">
              <a class="nav-link" href="{{route('create.seeker')}}">Job Seeker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('create.employer')}}">Employer</a>
            </li>
            @endif
             @if (Auth::check())  
             <li class="nav-item">
              <a class="nav-link" id="logout" href="#">Logout</a>
            </li>
             @endif
             <form id="form-logout" action="{{route('logout')}}" method="post"> @csrf</form>
          </ul>
        </div>
      </div>
    </nav>
</body>
@yield('content')

<script>
  let logout = document.getElementById('logout');
  let form = document.getElementById('form-logout');
  logout.addEventListener('click', function(){
     form.submit();
  })
</script>
</html>