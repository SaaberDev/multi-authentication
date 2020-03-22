@extends('backend.layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('isSuperAdmin'))
                            <h1> You are logged in ! ... SuperMan ! 🦸‍♂️</h1>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('isAdmin'))
                            <h1> You are logged in ! ... Boss ! 🤵</h1>
                        @endif

                        <div class="col">
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Ban</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($i = 1)
                                    @foreach($users as $value)
                                        <tr>
                                            <th scope="row">{{ $i }}</th> @php $i++; @endphp
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            @foreach($value->roles as $role)
                                                <td class="text-uppercase">
                                                    @if($role->name == 'isUser')
                                                        User
                                                    @elseif($role->name == 'isAdmin')
                                                        Admin
                                                    @endif
                                                </td>
                                            @endforeach
                                            <td>
                                                @if($value->status == 1)
                                                    <label for="status" class="text-success">Active</label>
                                                @else
                                                    <label for="status" class="text-danger">Inactive</label>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- Modal for Deleting User --}}
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="deleteUser"><i class="fas fa-user-times"></i></button>
                                                {{-- Delete Button Modal Start --}}
                                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this user ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Delete Button Modal End --}}

                                                {{-- Modal for Editing User --}}
                                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-whatever="editUser"><i class="fas fa-user-edit"></i></button>
                                                {{-- Edit Button Modal Start --}}
                                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">New message</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                                        <input type="text" class="form-control" id="recipient-name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Message:</label>
                                                                        <textarea class="form-control" id="message-text"></textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Send message</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Edit Button Modal End --}}

                                                {{-- Modal for Viewing User --}}
                                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#viewModal" data-whatever="viewUser"><i class="fas fa-eye"></i></button>
                                                {{-- View Button Modal Start --}}
                                                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="viewModalLabel">New message</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="name">Name:</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- View Button Modal End --}}
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-primary"><i class="fas fa-ban"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
