<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.index') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('language.langList') }}">Language</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('language.groups') }}">Language Groups</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Language Phrase Add</a>
            </li>
        </ul>
    </div>
</nav>
