@include('layouts.header')
<div class="wrapper">
  @include('layouts.nav-bar')
  <div id="content">
    @include('layouts.side-bar')
    <div class="container-fluid">
      @yield('content')
    </div>
  </div>
</div>
@include('layouts.footer')