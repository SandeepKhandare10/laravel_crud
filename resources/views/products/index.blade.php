<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <h1>Products</h1>
    <div class="alert alert-success float-right" style="position: absolute; right: 20px; top: 20px;">
    @if(session()->has('success'))
        {{ session('success') }}
    @endif
</div>

<div class="d-flex justify-content-end align-items-center mb-3">
    <a href="{{ route('product.create') }}" class="btn btn-primary mr-3">Create A Product</a><br>
    <form class="form-inline d-flex align-items-center" action="{{ route('product.index') }}" method="get">
        <input class="form-control mr-sm-2" 
               type="search" 
               name="search" 
               value="{{ request('search') }}" 
               placeholder="Search products" 
               aria-label="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>


   <table class="table table-striped table-bordered table-hover" style="width:100%; margin:0 auto; background-color: #f2f2f2;">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Qty</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr style="background-color: {{ $loop->iteration % 2 == 0 ? '#fff' : '#ddd' }};">
            <td data-label="Product ID">{{$product->id}}</td>
            <td data-label="Product Name">{{$product->name}}</td>
            <td data-label="Product Qty">{{$product->qty}}</td>
            <td data-label="Price">{{$product->price}}</td>
            <td data-label="Description">{{$product->description}}</td>
            <td>
    <a href="{{route('product.edit', ['product' => $product])}}">Edit</a>
</td>
        <td>
   <form method='post' action="{{ route('product.destroy', ['product' => $product]) }}" style="display:inline-block">
    @csrf
    @method('delete')
    <input type="submit" value='delete' onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger btn-sm">
</form>


<style>
/* General Table Styling */
table {
    width: 100%;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 15px;
    text-align: center;
    border: 1px solid #ddd;
}

th {
    background-color: #333;
    color: #fff;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:nth-child(odd) {
    background-color: #fff;
}

tr:hover {
    background-color: #e9ecef;
    cursor: pointer;
}

/* Buttons Styling */
.btn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-danger {
    background-color: #dc3545;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c82333;
}

.btn-outline-primary {
    background-color: transparent;
    color: #007bff;
    border: 1px solid #007bff;
}

.btn-outline-primary:hover {
    background-color: #007bff;
    color: #fff;
}

/* Search Form Styling */
.form-inline {
    display: flex;
    align-items: center;
    justify-content: flex-end; /* Aligns the search bar and button to the right */
    gap: 10px;
    margin-top: 10px;
}


.form-control {
    width: 300px;
    padding: 10px 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 20px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}
.d-flex.align-items-center .form-control {
    width: auto; /* Adjust the width of the search bar if needed */
    margin-right: 10px; /* Ensure proper spacing between input and button */
}

.d-flex.align-items-center a {
    margin-right: 15px; /* Adjust spacing between the button and form */
}

/* Responsive Styling */
@media (max-width: 768px) {
    table {
        font-size: 14px;
    }

    .form-inline {
        flex-direction: column;
        align-items: stretch;
    }

    .form-control {
        width: 100%;
    }

    .btn {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>

</td>       
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>