<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>Teachers</title>
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Teachers</h1>
            <a href="{{ route('teachers.create') }}" class="btn btn-success">Add New Teacher</a>
        </div>

        <form action="{{ route('teachers.index') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." value="{{ request()->keyword }}" name="keyword">
                <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
              </div>
        </form>
        @if ( session('msg') )
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
        @endif


        <table class="table table-bordered table-striped table-hover">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>

            @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->phone }}</td>
                {{-- <td>{{ $teacher->created_at->format('d M, Y') }}</td> --}}
                <td>{{ $teacher->created_at->format('d-m-Y') }}</td>
                <td>{{ $teacher->updated_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    {{-- <a href="{{ route('teachers.destroy', $teacher->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                    <form class="d-inline" action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                        @csrf
                        {{-- <input name="_method" value="delete" type="hidden" /> --}}
                        @method('delete')
                        {{-- {{ method_field('delete') }} --}}
                        <button onclick="return confirm('هل انت متاكد اخوي ؟! شاور حالك')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>

        {{ $teachers->links() }}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        setTimeout(() => {
            $('.alert').slideUp(700);
        }, 2000);

        // setInterval(() => {

        // }, 1000);


    </script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

        @if ( session('msg') )
        Toast.fire({
            icon: '{{ session("icon") }}',
            title: '{{ session("msg") }}'
        })
        @endif
    </script>
</body>
</html>
