@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                @include ('inc.messages')

                <div class="panel-body">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">Add Bookmark</button>

                    <hr>
                    <h3>My Bookmarks</h3>
                    <ul class="list-group">
                        @foreach($bookmarks as $bookmark)

                            <li class="list-group-item clearfix">
                                <a target="_blank" class="d-inline-block" href="{{ $bookmark->url }}">
                                    {{ $bookmark->name }}
                                </a>
                                <span class="label label-default d-inline-block">{{ $bookmark->description }}</span>
                                <span class="pull-right button-group">
                                    <button data-id="{{ $bookmark->id }}" class="delete-bookmark btn btn-danger" type="button" name="button">Delete</button>
                                </span>

                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Bookmark</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bookmarks.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Bookmark Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="url">Bookmark Url</label>
                        <input type="text" class="form-control" name="url" id="url">
                    </div>
                    <div class="form-group">
                        <label for="description">Website Description</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
