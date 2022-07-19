<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
    <div class="row">
        <div class="col-lg-12">
            <div class="flex justify-center">
                <h2>CRUD</h2>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
    
     
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name}}</td>
        </tr>
        @endforeach
    </table>