<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register subject</title>
</head>
<body>

    <div class="container my-5">
        <h1 class="text-center">All Subject</h1>
        <div class="row">

            <form action="{{ route('register_subject_submit') }}" method="POST">
                @csrf
                <table class="table table-bordered table-striped table-hover">
                    @foreach ($subjects as $subject)
                    <tr>
                        <td>
                            <input {{ $student->subjects->find($subject->id) ? 'checked' : ''}} type="checkbox" name="subject[]" value="{{ $subject->id }}" /> {{ $subject->id }}
                        </td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->hours }} Hours</td>
                    </tr>
                    @endforeach
                </table>
                <button class="btn btn-success">Register</button>
            </form>

        </div>
    </div>

</body>
</html>
