<li class="nav-item has-treeview  {{
    Route::is('product.*') || 
    Route::is('unit.*') || 
    Route::is('category.*')
     ? 'menu-open' : '' }}">
    <a href="#" class="nav-link  {{
    Route::is('product.*') ? 'active' : '' }}">

        <span class="nav-ico material-icons">description</span>
        <p>
            Inventory
            <span class="material-icons right">expand_more</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('product.all')}}" class="nav-link {{
          Route::is('product.all') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Products</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('product.add')}}" class="nav-link {{
                Route::is('product.add') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Add new</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('category.all')}}" class="nav-link {{
                Route::is('category.*') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Categories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('unit.all')}}" class="nav-link {{
                Route::is('unit.*') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Unit</p>
            </a>
        </li>

    </ul>
</li>