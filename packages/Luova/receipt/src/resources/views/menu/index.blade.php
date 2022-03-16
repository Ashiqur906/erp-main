<li class="nav-item has-treeview  {{
    Route::is('receipt.*') 
     ? 'menu-open' : '' }}">
    <a href="#" class="nav-link  {{
    Route::is('receipt.*') ? 'active' : '' }}">

        <span class="nav-ico material-icons">description</span>
        <p>
            Receipt
            <span class="material-icons right">expand_more</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('receipt.all')}}" class="nav-link {{
          Route::is('receipt.all') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Receipts</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('receipt.add')}}" class="nav-link {{
                Route::is('receipt.add') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Add new</p>
            </a>
        </li>


    </ul>
</li>