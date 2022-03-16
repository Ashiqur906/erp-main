<li class="nav-item has-treeview  {{
                Route::is('admin.hr') ||
                Route::is('admin.hr.*') ? 'menu-open' : '' }}">

    <a href="#" class="nav-link  {{
                Route::is('admin.hr') ||
                Route::is('admin.hr.*') ? 'active' : '' }}">

        <span class="nav-ico material-icons">people</span>
        <p>
            HR
            <span class="material-icons right">expand_more</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.hr.users')}}" class="nav-link {{
                      Route::is('admin.hr.users') ||
                      Route::is('admin.hr.user.*') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.hr.roles')}}" class="nav-link {{
                      Route::is('admin.hr.roles') ||
                      Route::is('admin.hr.role.*') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Roles</p>
            </a>
        </li>

    </ul>
</li>





@if(function_exists('luova_account'))

@include('account::menu.admin')

@endif

@if(function_exists('luova_purchases'))
@include('purchase::menu.admin')

@endif


@if(function_exists('luova_sales'))
@include('sale::menu.admin')

@endif
@if(function_exists('luova_page'))
@include('page::menu.admin')

@endif



@if(function_exists('luova_post'))
@include('post::menu.admin')

@endif