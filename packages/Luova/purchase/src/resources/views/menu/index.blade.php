<li class="nav-item has-treeview  {{
    Route::is('purchase.*')
     ? 'menu-open' : '' }}">
    <a href="#" class="nav-link  {{
    Route::is('purchase.*') ? 'active' : '' }}">

        <span class="nav-ico material-icons">description</span>
        <p>
            Purchase
            <span class="material-icons right">expand_more</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('purchase.all')}}" class="nav-link {{
          Route::is('purchase.all') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Purchases</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('purchase.add')}}" class="nav-link {{
                Route::is('purchase.add') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Add new</p>
            </a>
        </li>


    </ul>
</li>