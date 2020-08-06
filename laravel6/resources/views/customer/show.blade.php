<h1>Customer's Details</h1>

<a href ='/customers'>Back</a><br/>

<strong>Name</strong>
<p>{{$customer->name}}</p>


<strong>Email</strong>
<p>{{$customer->email}}</p>

<a href ="/customers/{{$customer->id}}/edit">Edit</a>

<form method ="POST" action ="/customers/{{$customer->id}}">
    @method("delete")
    @csrf
    <button>Delete Customer</delete>
</form>