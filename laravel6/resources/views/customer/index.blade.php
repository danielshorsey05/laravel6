<h1>Customers</h1>

<a href ="/customers/create">Create</a>

@forelse($customers AS $customer)
    <p>{{$customer->name}} ({{$customer->email}})</p>
@empty
    <p>No customers</p>
@endforelse