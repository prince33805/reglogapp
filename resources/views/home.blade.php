@include ('header')

@include ('layout')

<div class="container">
  <div class="row">
      <div class="col">
          {{-- <h1>Table</h1> --}}
          {{-- <div class="row">
            <div class="col-5">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
                  City
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  @foreach($city as $city)
                  <li><a class="dropdown-item" href="{{url('city',$city->city)}}">{{$city->city}}</a></li>
                  @endforeach
                </ul>
              </div>
          </div> --}}
            <div class="col-12">
              <form style="width: 80%;margin: 20px auto;" class="d-flex" action="{{url('search')}}" method="GET">
                <input class="form-control me-2" type="text" 
                placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </div>
          
          {{-- <form method="get" action="{{url('search')}}">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form> --}}
          
          <table class="table">
              <thead>
                <tr>
                  {{-- <th scope="col">Id</th> --}}
                  <th scope="col">Name</th>
                  <th scope="col">Age</th>
                  <th scope="col">Email</th>
                  <th scope="col">Gender</th>
                  <th scope="col">View</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  {{-- <th scope="row">{{$user->id}}</th> --}}
                  <td>{{$user->firstname}} {{$user->lastname}}</td>
                  <td>{{$user->age}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->gender}}</td>
                  <td><a class="" href="{{url('/user',$user->id)}}">View</a></td>
                  {{-- <td><img src="{{$user->image}}" style="width: 20px;height:20px"></td> --}}
                </tr>
                @endforeach
              </tbody>
          </table>
      </div>
      {{-- <div class="col-6">
          <h1>asdasdad</h1>
      </div> --}}
  </div>
  
  {{-- <div class="row">
    <div class="col">
      <h1>Filters</h1>
      <form>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          @foreach($searchusers as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->city}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->gender}}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
    </div>
  </div> --}}

@include ('footer')
