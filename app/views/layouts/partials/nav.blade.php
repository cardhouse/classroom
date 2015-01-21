<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
      </button>
      {{ link_to_route('home', 'DriveNY', null, ['class' => 'navbar-brand']) }}
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li>{{ link_to_route('locations_path', 'Locations') }}</li>
          <li>{{ link_to_route('local_classes_path', 'Local Classes') }}</li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      @if( $currentUser )
        <li>{{ link_to_route('account_path', $currentUser->email) }}</li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span class="glyphicon glyphicon-cog"></span><span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('account_path', 'View Account') }}</li>
            <li>{{ link_to_route('add_local_class_path', 'Add Class') }}</li>
            <li>{{ link_to_route('add_location_path', 'Add Location') }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('logout_path', 'Log Out') }}</li>
          </ul>
        </li>
        @else
        <li>{{link_to_route('login_path', 'Sign In') }}</li>
        <li class="navbar-text">|</li>
        <li>{{ link_to_route('register_path','Register') }}</li>
      @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>