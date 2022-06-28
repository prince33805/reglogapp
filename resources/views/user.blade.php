@include ('header')

@include ('layout')
       
<div class="container">
    <h2>My Profile</h2>
    <div class="row">
        <div class="col-4">
            img
        </div>
        <div class="col-8">
            Firstname : {{$user->firstname}}<br>
            Lastname : {{$user->lastname}}<br>
            {{-- Username : {{$user->username}} --}}
            Email : {{$user->email}}<br>
            Date of Birth : {{$user->age}}<br>
            Gender : {{$user->gender}}<br>
        </div>
    </div>

</div>



@include ('footer')