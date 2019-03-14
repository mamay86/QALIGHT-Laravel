@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h2 class="h2">Roles</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('roles.create') }}" title="Add New Roles">
                    <button class="btn btn-sm btn-outline-success"><span data-feather="plus"></span> Add New</button>
                </a>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>

            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-hover table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Posted On</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ date('d F Y', strtotime($role->created_at)) }}</td>
                    <td>
                        <a title="Read role" href="{{ route('roles.show', ['id'=> $role->id]) }}" class="btn btn-primary"><span data-feather="eye"></span></a>
                        <a title="Edit role" href="{{ route('roles.edit', ['id'=> $role->id]) }}" class="btn btn-warning"><span data-feather="edit"></span></a>
                        <button title="Delete role" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_role_{{ $role->id  }}"><span data-feather="delete"></span></button>
                    </td>
                </tr>

                <div class="modal fade" id="delete_role_{{ $role->id  }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <form class="" action="{{ route('roles.destroy', ['id' => $role->id]) }}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header bg-red">
                                    <h4 class="modal-title" id="mySmallModalLabel">Delete role</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    Are you sure to delete role: <b>{{ $role->name }} </b>?
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ url('/roles') }}">
                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline" title="Delete" value="delete">Delete</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
            </tbody>
        </table>
        {{ $roles->onEachSide(2)->links() }}
    </div>

@endsection