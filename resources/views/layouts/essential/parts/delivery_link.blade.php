<li class="nav-item has-treeview  {{
                Route::is('dman.booking.add') ||
                Route::is('dman.booking.*') ? 'menu-open' : '' }}">

    <a href="#" class="nav-link  {{
                Route::is('dman.booking.add') ||
                Route::is('dman.booking.*') ? 'active' : '' }}">

        <span class="nav-ico material-icons">child_friendly</span>
        <p>
            Pick Up
            <span class="material-icons right">expand_more</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('dman.booking.index')}}" class="nav-link {{
                      Route::is('dman.booking.index') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Pickup Waiting</p>
            </a>
            <a href="{{route('dman.booking.pickuped')}}" class="nav-link {{
                      Route::is('dman.booking.pickuped') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Pickup Parcels</p>
            </a>
        </li>


    </ul>
</li>
<li class="nav-item has-treeview  {{
                Route::is('dman.delivery.index') ||
                Route::is('dman.delivery.*') ? 'menu-open' : '' }}">

    <a href="#" class="nav-link  {{
                Route::is('dman.delivery.index') ||
                Route::is('dman.delivery.*') ? 'active' : '' }}">

        <span class="nav-ico material-icons">electric_moped</span>
        <p>
            Delivery
            <span class="material-icons right">expand_more</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('dman.delivery.index')}}" class="nav-link {{
                      Route::is('dman.delivery.index') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Today Delivery</p>
            </a>
            <a href="{{route('dman.delivery.index')}}" class="nav-link {{
                      Route::is('dman.delivery.index') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Return</p>
            </a>
        </li>


    </ul>
</li>