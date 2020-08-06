<h1>Customers</h1>

<a href ="/customers/create">Create</a>

@forelse($customers AS $customer)
    <p>{{$customer->name}} ({{$customer->email}}) <a href ="/customers/{{$customer->id}}/edit">Edit</a> <a href ="/customers/{{$customer->id}}">View</a></p>
@empty
    <p>No customers</p>
@endforelse