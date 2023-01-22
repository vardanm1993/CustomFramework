<div class="col-6">
    <h2 class="text-danger">Sign up <hr></h2>
    <form action="/register" method="post">
        <div class="mb-3">
            <label for="exampleInputFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="exampleInputFirstName"  name="firstname">
        </div>
        <div class="mb-3">
            <label for="exampleInputLastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="exampleInputLastName"  name="lastname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmailReg" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmailReg" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Repeat Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" name="confirmPassword">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheckReg">
            <label class="form-check-label" for="exampleCheckReg">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
