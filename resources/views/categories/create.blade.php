<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<div class="container">
<h2>Add New Category</h2>
<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
   @csrf
    
 <div class="form-group mr-5">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Category">
</div>
<button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>