<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('clubs.update',['club' => $club])}}">
        @csrf
        @method("put")
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$club->name}}">
        </div>
        <div>
            <label>Qty</label>
            <input type="text" name="qty" placeholder="Qty" value="{{$club->qty}}">
        </div>
        <div>
            <label>Price</label>
            <input type="decimal" name="price" placeholder="Price" value="{{$club->price}}">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$club->description}}">
        </div>

        <div>
            <input type="submit" value="Update">
        </div>

    </form>
</body>
</html>