@extends("app")

@section("pageTitle", "Services")

@section("body")

    <h1>Services</h1>
    
    
    <form action ="/service" method ="post">
        <input type ="text" name="name" autocomplete="off"/>
        @csrf
        
        
        <button>Add Service</button>
        
    </form>
    <p style = "color:red;">@error('name') {{$message}}  @enderror</p>

    <ul>
        @forelse($services AS $service)
            <li>{{ $service->name }} </li>
        @empty
            <li>No services available</li>
        @endforelse
    </ul>

@endsection

