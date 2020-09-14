<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="/" class="navbar-brand">Laravel Contacts</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a href="/" class="nav-item  nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="/create" class="nav-item  nav-link {{ Request::is('create') ? 'active' : '' }}">Create</a>
            <a href="/settings" class="nav-item  nav-link {{ Request::is('settings') ? 'active' : '' }}">Settings</a>
        </div>
    </div>    
</nav>
