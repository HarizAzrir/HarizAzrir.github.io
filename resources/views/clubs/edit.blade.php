<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Club</h1>
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
            <label>Club Name</label>
            <input type="text" name="clubname" placeholder="ClubName">
        </div>
        <div>
            <label>Club Nickname</label>
            <input type="text" name="club_nickname" placeholder="ClubNickname">
        </div>
        <div>
            <label>President</label>
            <input type="text" name="president" placeholder="President">
        </div>
        <div>
            <label>About</label>
            <input type="text" name="about" placeholder="About">
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email" placeholder="Email">
        </div>
        <div>
            <label>Instagram</label>
            <input type="text" name="instagram" placeholder="Instagram">
        </div>
        <div>
        <div>
            <label>Contact Number</label>
            <input type="text" name="contact_number" placeholder="ContactNumber">
        </div>

        <div>
            <input type="submit" value="Save the new club">
        </div>

    </form>
</body>
</html>