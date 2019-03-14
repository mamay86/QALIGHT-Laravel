@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 mb-3">
                @include('profile.partials._menu')
            </div>
            <div class="col-sm-9">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Posted On</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ date('d F Y', strtotime($post->created_at)) }}</td>
                                <td>
                                    <a title="Read post" href="{{ route('profile.post.show', $post->slug) }}">
                                        <button class="btn btn-sm btn-outline-primary"><span data-feather="eye"></span>
                                        </button>
                                    </a>
                                    <a title="Edit post" href="{{ route('profile.post.edit', ['slug'=> $post->slug]) }}" class="btn btn-outline-warning"><span data-feather="edit"></span></a>
                                    @can('delete-post', $post)
                                        <button title="Delete post" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_post_{{ $post->id  }}"><span data-feather="trash"></span></button>
                                    @endcan
                                </td>
                            </tr>

                            <div class="modal fade" id="delete_post_{{ $post->id  }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <form class="" action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header bg-red">
                                                <h4 class="modal-title" id="mySmallModalLabel">Delete post</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                Are you sure to delete post: <b>{{ $post->title }} </b>?
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url('/posts') }}">
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
                    <!-- Pagination -->
                    <div class="pagination justify-content-center mb-4">
                        {{ $posts->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection