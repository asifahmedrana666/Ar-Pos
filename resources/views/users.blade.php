@extends('layouts.app')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@section('content')




<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                
                <a href="create_user" class="btn btn-success" role="button" aria-pressed="true">Create User</a>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Users
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>User Role</th>
                                <th>Email</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>User Role</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                            @foreach ($users as $key=>$user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->user_role }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('user_edit',$user->id) }}" class="btn btn-success" role="button" aria-pressed="true">Edit</a>
                                    <a href="{{ route('delete_user',$user->id) }}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection