{{-- resources/views/articles/show.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Show Article - Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Show Article</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {{ $article->title }}
                </div>
                <div class="form-group">
                    <p>by : {{ $article->user->name }}</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <img src="{{ $article->imglink }}" class="embed-responsive-item" alt="Article Image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {{ $article->content }}
                </div>
            </div>
            <div class="col-lg-12">
                <a class="btn btn-outline-dark" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div>
</body>

</html>
