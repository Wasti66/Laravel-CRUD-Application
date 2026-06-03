<section>
    <div class="container">
        <h1 style="text-align: center; padding: 30px;">Simple Laravel CRUD App</h1>
        <a class="button float-right" href="{{ route('getUser') }}">Read</a>
        <br>
        <form method="post" action="{{ route('StoreUser') }}">
             @csrf 
            <fieldset>
                <!-- name -->
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Wazihatulla Wasti" id="name">
                @error('name')
                    <small style="color:red">{{ $message }}</small>    
                @enderror
                <!-- email -->
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="08wasti@gmail.com" id="email">
                @error('email')
                    <small style="color:red">{{ $message }}</small>    
                @enderror
                <!-- phone -->
                <label for="phone">Phone</label>
                <input type="text" name="phone" placeholder="+8801968618766" id="phone">
                @error('phone')
                    <small style="color:red">{{ $message }}</small>    
                @enderror
                <label for="address">Address</label>
                <textarea placeholder="Addredd......" name="address" id="address"></textarea>
                @error('address')
                    <small style="color:red">{{ $message }}</small><br>    
                @enderror
                <input class="button-primary" type="submit" value="Send">
            </fieldset>
        </form>
    </div>
</section>