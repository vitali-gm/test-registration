@extends('layout')

@section('title', 'List users')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-12">
            <h3>List users</h3>
            @if (session('message'))
                <div class="alert alert-{{session('status')}}">
                    {{session('message')}}
                </div>
            @endif
            <a class="link-primary" href="/user-registration">User registration</a>
            @if(count($users) > 0)

                <table class="table table-borderless">
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$user->name}}</td>
                            <td class="text-info">{{$user->email}}</td>
                            <td>
                                @if ($user->is_active)
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div>Not found user</div>
            @endif
        </div>
    </div>
@endsection

