@extends('master')

@section('title') Edit Blog @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Edit Blog</h3>
        <p>Use the following form to edit che chosen blog.</p>

        <hr>

        <form action="{{ url('edit/'. $blog->getId()) }}" method="post">
            {{ csrf_field() }}

            <p><input autofocus type="text" placeholder="Name..." name="name" class="form-control" value="{{ $blog->getName() }}" /></p>
            <p><input type="text" placeholder="Description..." name="description" class="form-control" value="{{ $blog->getDescription() }}" /></p>

            <hr>

            <p><button class="form-control btn btn-success">Save Blog</button></p>
        </form>
    </div>
</div>
@endsection