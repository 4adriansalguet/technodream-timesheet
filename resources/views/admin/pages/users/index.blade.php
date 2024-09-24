@extends('layouts.app')

@section('title', 'Technodream | Users')

@section('content')
<!-- MAIN -->

    <div class="table-data">
        <div class="user-tbl">
            <div class="head">
                <h3>Users</h3>
                <i class='bx bx-search' ></i>
                <a class="add-new-user-btn" href="{{route('users.page.add')}}">
                    <i class='bx bx-plus' ></i> 
                    <p>Add new User</p>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Position</th>
                        <th>Date Created</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users->count() > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td class="td-img">
                                    <img src="{{empty($user->avatar) ? asset('td-assets/users/user-avatar.png') : asset('td-assets/users/avatar/'. $user->avatar);}}" alt="{{$user->name}}">
                                    <div class="user-name">
                                        <p>{{$user->name}}</p>
                                        <p>{{$user->email}}</p>
                                    </div>
                                </td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->position}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    @if($user->role == 'Admin')
                                        <span class="status admin">{{$user->role}}</span>
                                    @elseif($user->role == 'Employee')
                                        <span class="status employee">{{$user->role}}</span>
                                    @else 
                                        <span class="status hr">{{$user->role}}</span>
                                    @endif
                                </td>
                                <td>
                                    <i class='bx bx-menu-alt-right user-single-action-icon' onclick="showSingleUserAction('{{$user->id}}')"></i>
                                    <div class="action-container o-container-{{$user->id}}">
                                        <div class="action-dialog">
                                            <div class="user-single-action">
                                                <i class='bx bx-x user-single-action-close' onclick="closeSingleAction('{{$user->id}}')"></i>
                                                <div class="action-header">
                                                    <img src="{{empty($user->avatar) ? asset('td-assets/users/user-avatar.png') : asset('td-assets/users/avatar/'. $user->avatar);}}" alt="">
                                                </div>
                                                <div class="action-body">
                                                    <ul>
                                                        <li><p>{{$user->name}}</p></li>
                                                        <li><p>{{$user->email}}</p></li>
                                                        <li><p>{{$user->position}}</p></li>
                                                    </ul>
                                                </div>
                                                <div class="action-footer">
                                                    <a href="{{route('users.page.add')}}"><i class='bx bx-edit-alt'></i> Edit</a>
                                                    <span></span>
                                                    <a href=""><i class='bx bx-trash-alt'></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else 
                        <tr><td>No Users found</td></tr>
                    @endif
                </tbody>
            </table>
            <div class="pagination-container">
                {{ $users->links('layouts.pagination') }}
            </div>
        </div>
    </div>
<!-- MAIN -->
@endsection

@section('script-admin')
    <script>
        // user page
    function showUserOption(icon){
        const userOption = document.querySelector('.user-option');
        if(userOption.classList.contains('show')){
            userOption.classList.remove('show');
            icon.classList.remove('bx-x');
            icon.classList.add('bx-filter');
            userOption.style.marginTop = '-200px';
        }else{
            userOption.classList.add('show');
            icon.classList.add('bx-x');
            icon.classList.remove('bx-filter');
            userOption.style.marginTop = '0';
        }
        
    }

    function showSingleUserAction(option){
        const userSingleActionContainer = document.querySelector('.o-container-'+option);
        userSingleActionContainer.style.display = 'block';
        userSingleActionContainer.classList.add('show');
        userSingleActionContainer.style.animation = 'fadeIn 0.3s';
    }

    function closeSingleAction(container){
        document.querySelector(`.o-container-${container}`).style.display = 'none';
    }
    </script>
@endsection