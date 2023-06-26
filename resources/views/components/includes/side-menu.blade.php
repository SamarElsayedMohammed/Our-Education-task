    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <img class="app-sidebar__user-avatar" width="50" height="50" src="{{ asset('images/avatar.png') }}"
                alt="User Image" />
            <div>
                <p class="app-sidebar__user-name">Admin</p>
                <p class="app-sidebar__user-designation">Dashboard Manger</p>
            </div>
        </div>
        <ul class="app-menu">

            @php
                echo printTreeArray(config('side-menu'));
            @endphp

        </ul>
    </aside>
