@extends('admin.layouts.main')

@section('title', $title)

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-primary mx-2">
                <span data-feather="plus" class="align-text-bottom"></span>
                Add user
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <!-- <a href="?delete=15" class="btn btn-sm btn-danger">Delete</a> -->
                            <button type="button" data-id="15" onclick="deleteClick(this)"
                                class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links('pagination::bootstrap-5') }}

    <script>
        function deleteClick(e) {
            console.log(e)
            let id = e.getAttribute('data-id');
            let answer = confirm("Are you sure to delete user " + id + "?")
            if (answer) {
                window.location = "?delete=" + id
            }

        }
    </script>
@endsection
