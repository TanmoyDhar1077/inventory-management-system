<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Category list</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-5">Category list</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
        </div>

        <div class="row">
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <span class="badge {{ $category->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $category->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ date('d M, Y h:i:s A', strtotime($category->created_at)) }}</td>
                            <td>
                                {{ $category->updated_at != $category->created_at ? date('d M, Y h:i:s A', strtotime($category->updated_at)) : 'NULL' }}
                            </td>

                            <td>
                                <span class="d-flex gap-1">
                                    <a href="{{route('category.status',$category->id)}}"
                                        class="btn {{ $category->status == 1 ? 'btn-warning' : 'btn-success' }}">{{ $category->status == 1 ? 'Inactive' : 'Active' }}</a>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('category.delete', $category->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
