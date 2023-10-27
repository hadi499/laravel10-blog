<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/posts">
                    <span data-feather="home"></span>
                    Blog
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file"></span>
                    My Posts
                </a>
            </li>

        </ul>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-dark ms-2 mt-5">Logout</button>
        </form>
        </li>

    </div>
</nav>