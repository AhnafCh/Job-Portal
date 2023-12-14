<!-- resources/views/search/index.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Users by Skill</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h1 class="mb-4">Search Users by Skill</h1>

    <form action="{{ route('search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Enter skill...">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

   <!-- Filter Section -->
   <form action="{{ route('search.index') }}" method="GET" class="mb-4">
    <div class="form-group">
        <label for="filter">Filter by Skill:</label>
        <select name="filter" class="form-control">
            <option value="">Select Skill</option>
            <option value="Machine Learning">Machine Learning</option>
            <option value="Gaming">Gaming</option>
            <option value="Blockchain">Blockchain</option>
            
        </select>
    </div>
    <button type="submit" class="btn btn-secondary">Filter</button>
</form>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Skills</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->email }}</td>
                    <td>
                        @if($record->skills)
                            <ul class="list-unstyled">
                                @foreach($record->skills as $skill)
                                    <li>{{ $skill }}</li>
                                @endforeach
                            </ul>
                        @else
                            No skills added
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
