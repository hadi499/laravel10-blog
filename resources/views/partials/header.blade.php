<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a href="">{{$category->name}}
                    </a>
                </li>

                @endforeach
            </ul>
        </div>
    </div>
</nav>