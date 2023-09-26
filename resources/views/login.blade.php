<x-layout>
    {{--    Create a login form using Bootstrap classes--}}
    <div class="card mt-5">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('login.store') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                           aria-describedby="emailHelp"
                           placeholder="Enter email">
                </div>
                <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                           placeholder="Password">
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</x-layout>
