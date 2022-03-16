<li class="nav-item has-treeview  {{
    Route::is('account.*')
     ? 'menu-open' : '' }}">
    <a href="#" class="nav-link  {{
    Route::is('account.*') ? 'active' : '' }}">

        <span class="nav-ico material-icons">calculate</span>
        <p>
            Accounting
            <span class="material-icons right">expand_more</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('account.all')}}" class="nav-link {{
          Route::is('account.all') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Chart of Accounts</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('account.add')}}" class="nav-link {{
                Route::is('account.add') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>New Account</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('account.journal')}}" class="nav-link {{
                Route::is('account.journal') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Journal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('account.ledger')}}" class="nav-link {{
                Route::is('account.ledger') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Ledger</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('account.balance.sheet')}}" class="nav-link {{
                Route::is('account.balance.sheet') ? 'active' : '' }}">
                <span class="material-icons nav-icon">panorama_fish_eye</span>
                <p>Balance Sheet</p>
            </a>
        </li>



    </ul>
</li>