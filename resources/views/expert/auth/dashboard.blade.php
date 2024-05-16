<h2>expert dashboard</h2>
<form method="POST" action="{{ route('expert.logout') }}">
    @csrf
    <button type="submit" class="btn-logout">
        Déconnexion
    </button>
</form>
