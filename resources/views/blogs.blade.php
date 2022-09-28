@extends('master')

@section('title') Blogs List @endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="{{ url('/add') }}" class="btn btn-success">Add Blog</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3>Blogs List</h3>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>

            @forelse($blogs as $blog)
            <tr>
                <td>{{ $blog->getId() }}</td>
                <td>{{ $blog->getName() }}</td>
                <td>{{ $blog->getDescription() }}</td>
                <td>
                    @if($blog->status())
                    Done
                    @else
                    Not Done
                    @endif
                    - <a href="{{ url('toggle/' . $blog->getId()) }}">Change</a>
                </td>
                <td>
                    <a href="{{ url('edit/' . $blog->getId()) }}" class="btn  btn-sm btn-primary">Edit</a>
                    <a href="{{ url('delete/' . $blog->getId()) }}" class="btn  btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No blogs in the list... for now!</td>
            </tr>
            @endforelse
        </table>
    </div>
</div>
@endsection