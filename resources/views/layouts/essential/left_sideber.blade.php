<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('/home')}}" class="brand-link">
    <img src="{{asset('admin/profile/logo.png')}}" alt="Luova Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light"> {{ config('app.name', 'Luova ERP') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @include('layouts.essential.parts.admin_link')



        @if(function_exists('is_account'))
        @include('account::menu.index')
        @endif

        
        @if(function_exists('is_receipt'))
        @include('receipt::menu.index')
        @endif

        @if(function_exists('is_payment'))
        @include('payment::menu.index')
        @endif
        
        @if(function_exists('is_contra'))
        @include('contra::menu.index')
        @endif


        @if(function_exists('is_inventory'))
        @include('inventory::menu.index')
        @endif

        @if(function_exists('is_sale'))
        @include('sale::menu.index')
        @endif

        @if(function_exists('is_purchase'))
        @include('purchase::menu.index')
        @endif


        @role('Super Admin')

        <li class="nav-item">
          <a href="{{route('option.index')}}" class="nav-link {{  Route::is('option.index')? 'active' : '' }}">
            <span class="material-icons nav-icon">psychology</span>
            <p>
              Globla Options

            </p>
          </a>
        </li>
        @endrole



      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>