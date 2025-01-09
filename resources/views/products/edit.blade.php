<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Edit a Product</h1>
<div>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    h1 {
        text-align: center;
        color: #00698f;
    }

    form {
        width: 50%;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"], textarea {
        width: 100%;
        height: 40px;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        height: 100px;
        resize: none;
    }

    input[type="submit"] {
        width: 100%;
        height: 40px;
        background-color: #00698f;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0088cc;
    }

    .error {
        color: #f00;
        font-size: 12px;
        margin-bottom: 10px;
    }
</style>
<div>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
<form method="post" action="{{ route('product.update',['product'=>$product]) }}">
    @csrf
    @method ('put')
    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter product name" value="{{$product->name}}">
    <br><br>
    <label for="qty">Quantity:</label>
    <input type="text" id="qty" name="qty" placeholder="Enter Quantity" value="{{$product->qty}}">
    <br><br>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" placeholder="Enter price" value="{{$product->price}}">
    <br><br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Enter product description" value="{{$product->description}}" style="resize: none;" rows="5" cols="30"></textarea>
    <br><br>
    <input type="submit" value="Update">
</form>
</body>
</html>