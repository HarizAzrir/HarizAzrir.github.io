<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a Club</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('clubs.store')}}">
        @csrf
        @method("post")
        <div>
            <label>Name</label>
            <input type="text" name="clubname" placeholder="ClubName">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description">
        </div>
        <div>
            <label>PresidentID</label>
            <input type="text" name="president" placeholder="President">
        </div>

        <div>
            <input type="submit" value="Save the new club">
        </div>

    </form>
</body>
</html>