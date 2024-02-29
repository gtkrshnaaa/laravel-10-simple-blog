{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                @auth
                <h3 class="navbar-brand" href="#">Simple Blog - Haii {{ Auth::user()->name }}</h3>
                @else
                <h3 class="navbar-brand" href="#">Simple Blog</h3>
                @endauth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        @auth <!-- Cek apakah pengguna sudah login -->
                            <li class="nav-item d-flex">
                                <a href="{{ route('dashboard.articles.index') }}" class="btn btn-outline-dark">Go to Dashboard</a>

                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-dark ml-3">Logout</button>
                                </form>
                            </li>
                        @else <!-- Jika pengguna belum login -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h2>Latest Articles</h2>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img src="{{ $article->imglink }}" class="card-img-top embed-responsive-item" alt="{{ $article->title }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <!-- Tampilkan nama pengguna -->
                            <p class="card-text">by: {{ $article->user->name }}</p>
                            <p class="card-text text-truncate">{{ $article->content }}</p>
                            <a href="{{ route('dashboard.articles.show', $article->id) }}" class="btn btn-outline-dark">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-start">
            {!! $articles->links() !!}
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
