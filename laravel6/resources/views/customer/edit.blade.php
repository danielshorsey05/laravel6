<h1>Edit customers details</h1>

<form method ="POST" action ="/customers/{{ $customer->id }}">
    
    @method("put")
    
    @include("customer.form")
        
    <button>Submit</button>
</form>

