@include ('header')

@include ('layout')
       
<div class="container">
    <div class="row">
            
        <div class="col-4">
            <h2>Login</h2>
            <hr>    
            <h5>Enter your email and password to login</h5>
            <form method="POST" action="/login">
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">*Email :</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">*Password :</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>
        
                <div class="form-group">
                    <button style="cursor :pointer" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            @if(session()->has('loginmessage'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    {{session()->get('loginmessage')}}
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button> --}}
                </div>
            @endif
         
        </div>

        <div class="vertical"></div>
        
        <div class="col-8">
            <h2>Register</h2>
            <hr>    
            <h5>Fill your information to register member</h5>

            <form method="POST" action="/register">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="firstname" class="col-sm-3 col-form-label">*First Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your firstname" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lastname" class="col-sm-3 col-form-label">*Last Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your lastname" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="birthday" class="col-sm-3 col-form-label">Date of Birth :</label>
                    <div class="col-sm-8">
                        <input type="date" id="age" name="age">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="profile" class="col-sm-3 col-form-label">*Profile Image :</label>
                    <div class="col-sm-8">
                        <input type="file" id="image" name="image" accept="image/png, image/gif, image/jpeg" onchange="loadFile(event)" required>
                        <img id="output">
                        <script>
                            var loadFile = function(event) {
                              var output = document.getElementById('output');
                              output.src = URL.createObjectURL(event.target.files[0]);
                              output.onload = function() {
                                URL.revokeObjectURL(output.src) // free memory
                              }
                            };
                        </script>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lastname" class="col-sm-3 col-form-label">*Gender :</label>
                    <div class="col-sm-4">
                        <input class="form-check-input" type="radio" name="gender" value="male" style="margin-top:7.5px" required>
                        <label class="form-check-label" for="male">
                            Male
                          </label>
                    </div>
                    <div class="col-sm-4">
                        <input class="form-check-input" type="radio" name="gender" value="female" style="margin-top:7.5px" required>
                        <label class="form-check-label" for="female">
                            Female
                          </label>
                    </div>
                </div>

                {{-- <div class="form-group row">
                    <label for="lastname" class="col-sm-3 col-form-label">Social :</label>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="checkbox" name="social" value="facebook" style="margin-top:7.5px" >
                        <label class="form-check-label" for="facebook">
                            Facebook
                          </label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="checkbox" name="social" value="facebook" style="margin-top:7.5px" >
                        <label class="form-check-label" for="twitter">
                            Twitter
                          </label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="checkbox" name="social" value="instagram" style="margin-top:7.5px" >
                        <label class="form-check-label" for="instagram">
                            Instagram
                          </label>
                    </div>

                    <label for="lastname" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-3">
                        <input class="form-check-input" type="checkbox" name="social" value="line" style="margin-top:7.5px"  >
                        <label class="form-check-label" for="line">
                            line
                          </label>
                    </div>
                    <div class="col-sm-3">
                        <input class="form-check-input" type="checkbox" name="social" value="tiktok" style="margin-top:7.5px" >
                        <label class="form-check-label" for="tiktok">
                            Tiktok
                          </label>
                    </div>
                </div> --}}
        
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">*Email :</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>                
                    </div>
                </div>

                <div class="form-group row" >
                    <label for="password" class="col-sm-3 col-form-label">*Password :</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[#?!@$%^&*-\]\[]).{8,}" placeholder="Enter your password"
                        title="Must contain at least one number, one uppercase, one lowercase, one special character, and at least 8 or more characters" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_confirmation"  class="col-sm-3 col-form-label">*Confirm Password :</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[#?!@$%^&*-\]\[]).{8,}" placeholder="Enter your password"
                        title="Must contain at least one number, one uppercase, one lowercase, one special character, at least 8 or more characters, and same as your password " required>
                    </div>
                </div>

                {{-- <div class="row g-3">
                    <div class="form-group" style="width : 50%">
                        <label for="gender">Gender :</label>
                        <input type="text" class="form-control" id="gender" name="gender" required>
                    </div>
                </div> --}}

        
                <div class="form-group">
                    <button style="cursor :pointer" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{session()->get('message')}}
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button> --}}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
         
        </div>
    </div>
    

</div>



@include ('footer')