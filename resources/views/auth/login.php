<div class="col-6">
    <h2 class="text-danger">Sign In<hr></h2>

    <form action="/login" method="post">
        <div class="mb-3">
            <label for="exampleInputEmailLogin" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmailLogin" aria-describedby="emailHelp" name="login">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPasswordLogin" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPasswordLogin" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheckLogin" name="checkLogin">
            <label class="form-check-label" for="exampleCheckLogin">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
