<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Clubs</h1>

        @if(session()->has('success'))
        <div class="bg-green-200 p-4 mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('clubs.create') }}" class="text-blue-500">Create a Club</a>
        </div>

        <!-- Add dropdown filter form -->
        <form method="get" action="{{ route('clubs.index') }}" class="mb-4">
            <label for="filter" class="block">Filter by Name:</label>
            <select id="filter" name="filter" class="border p-2">
                <option value="">All Clubs</option>
                @foreach($allClubs as $clubId => $clubname)
                <option value="{{ $clubId }}" @if(request('filter') == $clubId) selected @endif>{{ $clubname }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-500 text-white p-2 ml-2">Filter</button>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">ID</th>
                        <th class="py-2 px-4 border">Club name</th>
                        <th class="py-2 px-4 border">Club nickname</th>
                        <th class="py-2 px-4 border">Club president</th>
                        <th class="py-2 px-4 border">About</th>
                        <th class="py-2 px-4 border">Email</th>
                        <th class="py-2 px-4 border">Instagram</th>
                        <th class="py-2 px-4 border">Contact Number</th>
                        <th class="py-2 px-4 border">Picture</th>
                        <th class="py-2 px-4 border">Edit</th>
                        <th class="py-2 px-4 border">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clubs as $club)
                    <tr>
                        <td class="py-2 px-4 border">{{ $club->id }}</td>
                        <td class="py-2 px-4 border">{{ $club->clubname }}</td>
                        <td class="py-2 px-4 border">{{ $club->club_nickname }}</td>
                        <td class="py-2 px-4 border">{{ $club->president }}</td>
                        <td class="py-2 px-4 border">{{ $club->about }}</td>
                        <td class="py-2 px-4 border">{{ $club->email }}</td>
                        <td class="py-2 px-4 border">{{ $club->instagram }}</td>
                        <td class="py-2 px-4 border">{{ $club->contact_number }}</td>
                        <td class="py-2 px-4 border"><img style="max-width: 100px; height: auto;"
                                src="{{ $club->getImageURL() }}" alt="Profile Picture"></td>
                        <td class="py-2 px-4 border"><a href="{{ route('clubs.edit', ['club' => $club]) }}"
                                class="text-blue-500">Edit</a></td>
                        <td class="py-2 px-4 border">
                            <form method="post" action="{{ route('clubs.destroy', ['club' => $club]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
