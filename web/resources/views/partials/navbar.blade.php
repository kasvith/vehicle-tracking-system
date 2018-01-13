<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">VIS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

        <ul class="navbar-nav mr-auto">
            @if(auth()->check())
            <li class="nav-item active">
                <a class="nav-link" href="/"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/entry"><i class="fa fa-plus"></i> Add Entry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/search"><i class="fa fa-search"></i> Search</a>
            </li>

                @if(auth()->user()->type == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/admin"><i class="fa fa-dashcube"></i> Admin Panel</a>
                    </li>
                @endif
            @endif
        </ul>


        <ul class="navbar-nav pull-right">
            @if(!auth()->check())
                <li class="btn btn-outline-success my-2 my-sm-0 pull-right"><a href="/login">Sign In</a></li>
            @else
                <li class="nav-item"><a href="/profile" class="nav-link"><i class="fa fa-user"></i> {{ auth()->user()->name }}</a></li>
                <li class="btn btn-outline-success my-2 my-sm-0 pull-right"><a href="/logout"><i class="fa fa-sign-out"></i> Sign Out</a></li>
            @endif
        </ul>
    </div>
</nav>