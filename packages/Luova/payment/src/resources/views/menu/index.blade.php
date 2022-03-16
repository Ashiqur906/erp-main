<li class="nav-item has-treeview  {{
    Route::is('payment.*') 
     ? 'menu-open' : '' }}">
    <a href="#" class="nav-link  {{
    Route::is('payment.*') ? 'active' : '' }}">

        <span class="nav-ico material-icons">description</span>
        <p>
            Payment
            <span class="material-icons right">expand_more</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('payment.all')}}" class="nav-link {{
          Route::is('payment.all') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Payments</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('payment.add')}}" class="nav-link {{
                Route::is('payment.add') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Add new</p>
            </a>
        </li>


    </ul>
</li>