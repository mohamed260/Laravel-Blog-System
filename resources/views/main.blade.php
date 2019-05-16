<!DOCTYPE html>
<html lang="en">
  <head>
      @include('partials._head')
  </head>

      <body>

      @include('partials._nav')

        


      <div class="container">

      @include('partials._messeges')
             
      @yield('content')

      @include('partials._footer')

      </div>

      @include('partials._javescript')

      @yield('scripts')

    </body>
</html>