<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Clubs </h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('clubs.create')}}">Create a Club</a>
        </div>

        <!-- Add dropdown filter form -->
    <form method="get" action="{{ route('clubs.index') }}">
        <label for="filter">Filter by Name:</label>
        <select id="filter" name="filter">
            <option value="">All Clubs</option>
            @foreach($allClubs as $clubId => $clubName)
                <option value="{{$clubId}}" @if(request('filter') == $clubId) selected @endif>{{$clubName}}</option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>ClubName</th>
                <th>Description</th>
                <th>President</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($clubs as $club)
                <tr>
                    <td>{{$club->id}}</td>
                    <td>{{$club->clubname}}</td>
                    <td>{{$club->description}}</td>
                    <td>{{$club->president}}</td>
                    <td>
                        <a href="{{route('clubs.edit', ['club' => $club])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('clubs.destroy', ['club' => $club])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</body>
</html>