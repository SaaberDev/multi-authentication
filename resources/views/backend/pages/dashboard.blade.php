@extends('backend.layouts.app')
@section('title', 'Dashboard')

@push('styles')
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endpush

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
                                <h1> Welcome Back ! ... SuperMan 🦸‍♂️</h1>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('isAdmin'))
                                <h1> Welcome Back ! ... Boss 🤵</h1>
                            @endif
                            <div class="container">
                                <div class="col-md-12">
                                    <table class="table table-dark">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(Auth::user()->hasRole('isSuperAdmin') or
                                            Auth::user()->hasRole('isAdmin'))

                                            @if($i = 1)
                                        @foreach($users as $value)
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $value->name }}</td>
                                                @foreach($value->roles as $role)
                                                <td> {{ $role->name }} </td>
                                                @endforeach
                                                <td>{{ $value->email }}</td>
                                                <td>
                                                    @if($value->isActive == 1)
                                                        <label class="btn-outline-success">Active</label>
                                                        @else
                                                        <label class="btn-outline-warning">
                                                            Pending
                                                        </label>
                                                        @endif

                                                </td>
                                                <td>
                                                    <button class="btn btn-outline-danger"><i class="fas fa-user-times"></i></button>
                                                    <button class="btn btn-outline-success"><i class="fas fa-user-edit"></i></button>
                                                    <button class="btn btn-outline-success"><i class="fas fa-eye"></i></button>
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                            @endif
                                        @endif
                                        {{--@php $i = 1 @endphp
                                        @if(!empty($users))--}}

                                        {{--@else
                                        <h3>NO USER DATA</h3>
                                    @endif
                                    @php $i++ @endphp--}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Bootstrap JS --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endpush
