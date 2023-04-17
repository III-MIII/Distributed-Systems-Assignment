  <?php include('layout-header.php');?>

    <!-- ======= Hero Section ======= -->
    <section class=" bg-light">
        <div class="container p-3">
            <h1>Sign Up</h1> 
        </div>
    </section><!-- End Hero Section -->
        
    <main> 
        <div class="container">  
 
            <div class="row  p-3 justify-content-center"> 
                <div class="col-md-6 border rounded p-3  m-3">  

                    <h5 class="text-center">Register</h5>
                    <hr/>

                    <form id="signUpForm">
                        <div class="mb-3">
                            <label for="formName" class="form-label">Full Name</label>
                            <input name="formName" type="text" id="formName" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="formEmail" class="form-label">Email</label>
                            <input name="formEmail" type="text" class="form-control" id="formEmail">
                        </div>
    
                        <div class="mb-3">
                            <label for="formAddress" class="form-label">Address</label>
                            <textarea name="formAddress" class="form-control" id="formAddress" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="formPassword" class="form-label">Password</label>
                            <input name="formPassword" type="password" class="form-control" id="formPassword">
                        </div>
                        
                        <button class="btn btn-danger rounded-pill" id="signUp" type="submit">sign up</button>
                    </form>
                    
                </div> 
            </div>

        </div>
    </main>
    <!-- End #main -->

    <script>
        document.getElementById('signUpForm').onsubmit = function (event) {
            event.preventDefault()
            // alert('form submission triggered');
            // get form data
            form = document.getElementById('signUpForm');
            const formData = new FormData(form);

            // submit api endpoint
            fetch('http://localhost:8002/api/users/create', {
                method: 'POST',
                body: formData,
                mode: 'no-cors',
            })
            .then((response) => response)
            .then((data) => {
                alert('Form submitted. Thanks!');
            })
        }
    </script>

    
  <?php include('layout-footer.php');?>