<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <span class="material-icons">reorder</span>
      </a>
    </li>

  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="material-icons">forum</i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('admin/profile/user.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" onclick="UndeadNotification();">
        <i class="material-icons">add_alert</i>

        @if(count(auth()->user()->unreadNotifications))
        <span class="badge badge-warning navbar-badge" id="viewNotification">
          {{ count(auth()->user()->unreadNotifications) }}
        </span>
        @endif


      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header"> {{ count(auth()->user()->unreadNotifications) }} Notifications</span>
        <div class="dropdown-divider"></div>
        @foreach(auth()->user()->notifications->take(3) as $k => $notification)
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> {{ $notification->data['data']}}
          <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans()}}</span>
        </a>
        @endforeach
        <div class="dropdown-divider"></div>
        <a href="{{route('all.notification')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link admin-nav" data-toggle="dropdown" href="#">
        <img src="{{asset('admin/profile/user.png')}}" class="img-circle elevation-2" alt="User Image">
        {{ Auth::user()->name }} <span class="material-icons right">expand_more</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <ul class=" admin-nav-list">
          <li><a href="#">
              <span class="material-icons">account_circle</span>
              Profile
            </a>
          </li>
          <li>
            <a href="#">
              <span class="material-icons">settings</span>
              Settings
            </a>
          </li>
          <li>


            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <span class="material-icons">power_settings_new</span> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </li>


  </ul>
</nav>

@push('scripts')

<script>
  function UndeadNotification() {
    let route = "{{ route('unread.notification') }}";
    $.ajax({
      url: route,
      method: 'get',
      success: function(data) {
        //console.log(data);
        if (data.pass == "Yes") {
          $('#viewNotification').html(0);

        } else {
          alert('There are somethings problem!');
        }

      },
      error: function() {}
    });
  }
</script>
@endpush