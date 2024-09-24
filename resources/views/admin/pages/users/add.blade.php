@extends('layouts.app')

@section('title', 'Technodream | Add Users')

@section('content')
<!-- MAIN -->
    <div class="table-data">
        <div class="add-user-left">
            <form id="form" action="{{route('users.page.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="avatar">
                <img src="{{asset('td-assets/users/user-avatar.png')}}" alt="Avatar">
                <input type="file" id="avatar" name="avatar" accept="image/*">
                <button type="button" role="button" onclick="document.getElementById('avatar').click();">Upload Avatar</button>
                <h1>Set up new Technodream user</h1>
                <p>It should only take a couple of minutes to complete this set up.</p>
            </div>
        </div>
        
        <div class="add-user-form">
            <div class="container">
                <div class="form-content">
                    <div class="label">
                        <label for="firstname">First Name</label>
                    </div>
                    <div class="input">
                        <input type="text" id="firstname" name="firstname" value="{{old('firstname')}}" placeholder="First Name">
                    </div>
                </div>
                <div class="form-content">
                    <div class="label">
                        <label for="middlename">Middle Name</label>
                    </div>
                    <div class="input">
                        <input type="text" id="middlename" name="middlename" value="{{old('middlename')}}" placeholder="Middle Name">
                    </div>
                </div>
                <div class="form-content">
                    <div class="label">
                        <label for="lastname">Last Name</label>
                    </div>
                    <div class="input">
                        <input type="text" id="lastname" name="lastname" value="{{old('lastname')}}" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-content">
                    <div class="label">
                        <label for="email">Email</label>
                    </div>
                    <div class="input">
                        <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Email">
                    </div>
                </div>
                <div class="form-content">
                    <div class="label">
                        <label>Gender</label>
                        <input type="radio" id="male" name="gender" value="Male">
                        <input type="radio" id="female" name="gender" value="Female">
                    </div>
                    <div class="input gender">
                        <div class="radio">
                            <i class='bx bx-male-sign bx-md icon-male' onclick="chooseGender('male')"></i>
                            <p>Male</p>
                        </div>
                        <div class="radio">
                            <i class='bx bx-female-sign bx-md icon-female' onclick="chooseGender('female')"></i>
                            <p>Female</p>
                        </div>
                    </div>
                </div>
                <div class="form-content">
                    <div class="label">
                        <label>Role</label>
                        <input type="radio" id="admin" name="role" value="Admin">
                        <input type="radio" id="hr" name="role" value="HR">
                        <input type="radio" id="employee" name="role" value="Employee">
                    </div>
                    <div class="input role">
                        <div class="radio">
                            <i class='bx bxs-user-detail bx-md icon-admin' onclick="chooseRole('admin')"></i>
                            <p>Admin</p>
                        </div>
                        <div class="radio">
                            <i class='bx bxs-user-check bx-md icon-hr' onclick="chooseRole('hr')"></i>
                            <p>HR</p>
                        </div>
                        <div class="radio">
                            <i class='bx bxs-user bx-md icon-employee' onclick="chooseRole('employee')"></i>
                            <p>Employee</p>
                        </div>
                    </div>
                </div>
                <div class="form-content">
                    <div class="label">
                        <label for="position">Position</label>
                    </div>
                    <div class="input">
                        <input type="hidden" id="position" name="position" value="{{old('position')}}">
                        <div class="custom-select">
                            <div class="selected-option">Select Position</div>
                            <ul class="options">
                                <li class="option">Programmer</li>
                                <li class="option">SEO</li>
                                <li class="option">SMM</li>
                                <li class="option">PULS</li>
                                <li class="option">Project Manager</li>
                                <li class="option">QA</li>
                                <li class="option">Sales</li>
                                <li class="option">Call Center</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-content">
                    <div class="label">
                        <label for="password">Password</label>
                    </div>
                    <div class="input">
                        <input type="password" id="password" name="password" value="{{old('password')}}" placeholder="Password">
                    </div>
                </div>
                <div class="form-content">
                    <div class="label">
                        <label for="password-confirmation">Confirm Password</label>
                    </div>
                    <div class="input">
                        <input type="password" id="password-confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="add-user-buttons">
                    <input type="button" role="button" class="reset-user-btn" value="Reset Inputs" onclick="resetForm()">
                    <input type="submit" class="create-user-btn" value="Add User">
                </div>
            </div>
            </form>
        </div>
    </div>
<!-- MAIN -->
@endsection

@section('script-admin')
    <script>
        // add user page
        function chooseGender(gender){
            const iconMale = document.querySelector('.icon-male');
            const iconFemale = document.querySelector('.icon-female');
            if(gender == 'male'){
                document.getElementById('male').checked = true;
                iconFemale.classList.remove('active');
                iconMale.classList.add('active');
            }else{
                document.getElementById('female').checked = true
                iconMale.classList.remove('active')
                iconFemale.classList.add('active');
            }
        }

        function chooseRole(role){
            const iconAdmin = document.querySelector('.icon-admin');
            const iconEmployee = document.querySelector('.icon-employee');
            const iconHr = document.querySelector('.icon-hr');
            if(role == 'admin'){
                document.getElementById('admin').checked = true;
                iconHr.classList.remove('active');
                iconEmployee.classList.remove('active');
                iconAdmin.classList.add('active');
            }else if(role == 'hr'){
                document.getElementById('hr').checked = true;
                iconAdmin.classList.remove('active');
                iconEmployee.classList.remove('active');
                iconHr.classList.add('active');
            }else{
                document.getElementById('employee').checked = true;
                iconAdmin.classList.remove('active');
                iconHr.classList.remove('active');
                iconEmployee.classList.add('active');
            }
        }

        // select option
        const inputPosition = document.querySelector('#position');
        const customSelect = document.querySelector('.custom-select');
        const selectedOption = document.querySelector('.selected-option');
        const optionsList = document.querySelector('.options');
        const options = document.querySelectorAll('.option');

        selectedOption.addEventListener('click', () => {
            optionsList.classList.toggle('show');
        });

        options.forEach(option => {
            option.addEventListener('click', () => {
                selectedOption.innerHTML = option.innerHTML;
                inputPosition.value = option.innerHTML;
                optionsList.classList.remove('show');
            });
        });

        document.addEventListener('click', e => {
            if (!customSelect.contains(e.target)) {
                optionsList.classList.remove('show');
            }
        });

        document.getElementById('avatar').addEventListener('change', function(e){
            const avatar = document.querySelector('.avatar img')
            const [file] = this.files
            if (file) {
                avatar.src = URL.createObjectURL(file)
            }
        });

        // reset form
        function resetForm(){
            document.querySelector('#form').reset();
            document.querySelector('input').checked = false;
            let radio = document.querySelectorAll('.radio i');
            radio.forEach(function(item){
                item.classList.remove('active');
            });
        }
    </script>
@endsection

@include('layouts.alert')