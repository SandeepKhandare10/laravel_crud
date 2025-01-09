<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Create a Product</h1>
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
    form {
        width: 50%;
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #ccc;
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
        background-color: #4CAF50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #3e8e41;
    }

    .error {
        color: #red;
    }
</style>

<form method="post" action="{{ route('product.store') }}">
    @csrf
    @method ('post')

    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter product name"><br><br>
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="qty">Quantity:</label>
    <input type="text" id="qty" name="qty" placeholder="Enter Quantity"><br><br>
    @error('qty')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" placeholder="Enter price"><br><br>
    @error('price')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Enter product description" style="resize: none;" rows="5" cols="30"></textarea><br><br>
    @error('description')
        <div class="error">{{ $message }}</div>
    @enderror

    <input type="submit" value="Submit">
</form>
</body>
</html>