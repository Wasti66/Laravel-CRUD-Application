<section>
    <div class="container">
        <h1 style="text-align: center; padding: 30px;">Update User</h1>
        <a class="button float-right" href="{{ route('UserPages') }}">Back</a>
        <br>
        <form method="post" action="{{ route('UserUpdate', $user->id) }}">
             @csrf 
            <fieldset>
                <!-- name -->
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
                @error('name')
                    <small style="color:red">{{ $message }}</small>    
                @enderror
                <!-- email -->
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ $user->email }}">
                @error('email')
                    <small style="color:red">{{ $message }}</small>    
                @enderror
                <!-- phone -->
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ $user->phone }}">
                @error('phone')
                    <small style="color:red">{{ $message }}</small>    
                @enderror
                <label for="address">Address</label>
                <textarea name="address" id="address">{{ $user->address }}</textarea>
                @error('address')
                    <small style="color:red">{{ $message }}</small><br>    
                @enderror
                <input class="button-primary" type="submit" value="Send">
            </fieldset>
        </form>
    </div>
</section>