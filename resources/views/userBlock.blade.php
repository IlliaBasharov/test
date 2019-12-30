@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="container">
                        <table>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Administrator</th>
                                <th>Phone</th>
                                <th>Last online at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr><td>{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->is_admin }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->last_online_at }}</td>
                                    <td>{{ $user->status }}</td>
                                    @if(Auth::user()->id != $user->id)
                                    <td>
                                        <form method="GET" action="user-block/{{$user->id}}">
                                            <input type="submit" value="{{$user->status=='active' ? 'Заблокировать' : 'Разблокировать'}}">
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
