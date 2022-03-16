<li class="nav-item has-treeview  {{
    Route::is('sale.*') 
     ? 'menu-open' : '' }}">
    <a href="#" class="nav-link  {{
    Route::is('sale.*') ? 'active' : '' }}">

        <span class="nav-ico material-icons">description</span>
        <p>
            Sale
            <span class="material-icons right">expand_more</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('sale.all')}}" class="nav-link {{
          Route::is('sale.all') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Sales</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('sale.add')}}" class="nav-link {{
                Route::is('sale.add') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Add new</p>
            </a>
        </li>


    </ul>
</li>