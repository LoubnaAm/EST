<div class="navi">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="icon">
                    <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                </span>
                <span class="title">Neta Talk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users') }}">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Users</span>
            </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.experts') }}">
                <span class="icon">
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                </span>
                <span class="title">Experts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.rating') }}">
                <span class="icon">
                    <ion-icon name="star-outline"></ion-icon>
                </span>
                <span class="title">Rating</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.historique') }}">
                <span class="icon">
                    <ion-icon name="time-outline"></ion-icon>
                </span>
                <span class="title">Historique</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Sign Out</span>
            </a>
        </li>
    </ul>
</div>
