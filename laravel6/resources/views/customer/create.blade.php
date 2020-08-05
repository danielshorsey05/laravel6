
<form method ="POST" action ="/customers/store">
    
    @csrf
    
    <div>
        <label for="name">Name</label>
        <input type ="text" name ="name" value = "{{ old('name') }}"/>
        @error('name') <p style ="color:red;">{{$message}}</p> @enderror
    </div>
        
    <div>
        <label for="email">Email</label>
        <input type ="email" name="email" value = "{{ old('email') }}"/>
        @error('email') <p style ="color:red;">{{$message}}</p> @enderror
    </div>
        
    <button>Submit</button>
</form>
