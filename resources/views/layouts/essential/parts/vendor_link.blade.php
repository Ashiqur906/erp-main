<li class="nav-item has-treeview  {{
                Route::is('booking.add') ||
                Route::is('booking.*') ? 'menu-open' : '' }}">

    <a href="#" class="nav-link  {{
                Route::is('booking.add') ||
                Route::is('booking.*') ? 'active' : '' }}">

        <span class="nav-ico material-icons">book_online</span>
        <p>
            Booking
            <span class="material-icons right">expand_more</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('booking.index')}}" class="nav-link {{
                      Route::is('booking.index') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>All Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('booking.add')}}" class="nav-link {{
                      Route::is('booking.add') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Add New Booking</p>
            </a>
        </li>

    </ul>
</li>