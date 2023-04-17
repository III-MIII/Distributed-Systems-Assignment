  <?php include('layout-header.php');?>
    
    <!-- ======= Hero Section ======= -->
    <section class=" bg-light">
        <div class="container p-3">
            <h1 id="item-title"></h1> 
        </div>
    </section><!-- End Hero Section -->
        
    <main> 
        <div class="container">  

            <div class="row border rounded p-3 m-3">
               
                <div class="col-md-6 ">
                    <img  src="images/menu/menu-item-1.png" class="w-75" alt=""> 
                </div>
                <!- Menu Item ->
                
                <div class="col-md-6 ">
                    <h4 id="product-name" class="py-2">Magnam Tiste</h4>
                    <hr/>
                    <p id="product-description"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Delectus nostrum omnis reprehenderit ratione. Quasi minima, 
                        perspiciatis eos architecto laborum veniam suscipit deserunt. 
                        Qui blanditiis dignissimos eos totam. Quae, delectus eos?</p>
                    <p id="product-price" class="text-danger fw-bold"> EUR 5.95</p>

                    <hr/>

                    <h6>Reviews</h6>
                    <div class="h6"> Lorem ipsum dolor sit, amet consectetur adipisicing elit - Patrick</div> 
                    <div class="h6"> Lorem ipsum dolor sit, amet consectetur adipisicing elit - Matheo</div> 
                    <div class="h6"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. - John</div>
 
                </div> 
            </div>

            <div class="row border rounded p-3 m-3">
                
                <div class="col-md-12 ">  
                    <form id="orderForm">
                        <h5 class="text-center">Make Order</h5>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Product ID, you see it in the url</label>
                            <input type="number" value="1" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                            <input type="number" value="1" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="name@example.com">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        
                        <button class="btn btn-danger rounded-pill" id="placeOrder" type="submit">order now</button>
                    </form>
                </div> 
            </div>

        </div> 
<!--
        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->product_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->description }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Weight (kg.):</strong>
                {{ $product->weight }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Power (PS.):</strong>
                {{ $product->power_ps }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price (€):</strong>
                {{ $product->price }}
            </div>
        </div>
    </div>
    </main> -->
    <!-- End #main -->
    

    <script>
        // get the product id from the query parameters
        var urlParams = new URLSearchParams(window.location.search);
        var pId = urlParams.get('productId');
        console.log(pId);

        // get data from api
        fetch('http://localhost:8002/api/products/' + pId)
        .then((response) => response.json())
        .then((apiResponse) => {
            // add data to page
            console.log(apiResponse)
            document.getElementById('product-name').innerHTML = apiResponse.product_name;
            document.getElementById('product-image').innerHTML = apiResponse.image;
            document.getElementById('item-title').innerHTML = apiResponse.product_name;
            document.getElementById('product-description').innerHTML = apiResponse.description;
            document.getElementById('product-price').innerHTML = apiResponse.price;

        })

        document.getElementById('orderForm').onsubmit = function (event) {
            event.preventDefault()
            // alert('form submission triggered');
            // get form data
            form = document.getElementById('orderForm');
            const formData = new FormData(form);

            // submit api endpoint
            fetch('http://localhost:8002/api/users/create', {
                method: 'POST',
                body: formData,
                mode: 'no-cors',
            })
            .then((response) => response)
            .then((data) => {
                alert('Order submitted. Thanks!');
            })
        }

        
    </script>

  <?php include('layout-footer.php');?>