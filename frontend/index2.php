<?php include('head-layout.php');?>

<body>
    <br>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pull-left">
                        <h2>Car-App Products</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="/create_product.php">Create New Product</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <table id="table-content" class="table table-bordered">
                    
                </table>
            </div>
        </div>
    </main>

    <script>
        function displayProducts(products){
            console.log(products);
            let txt = `
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
            `;

            for(index in products){
                txt += `
                    <tr>
                        <td>${products[index].id}</td>
                        <td>${products[index].product_name}</td>
                        <td>${products[index].description}</td>
                        <td>
                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                <a class="btn btn-info"href="shop-item.php?productId=${products[index].id}">Show</a>
                                <a class="btn btn-primary" href="/">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    <tr>
                `;
                document.getElementById('table-content').innerHTML = txt;
            }
        }

        fetch('http://localhost:8002/api/products')
        .then( (response) => response.json())
        .then( (products) => {
            // console.log(products);
            displayProducts(products.data);
        })
    </script>

    <!--
        <div class="col-md-3 border rounded p-3 m-3">
                        <img src="${products[index].image}" class="w-50" alt="">
                        <h4>${products[index].product_name}</h4>
                        <p>${products[index].description}</p>
                        <p class="text-danger fw-bold">${products[index].price}</p>
                        <a href="shop-item.php?productId=${products[index].id}" class="btn btn-danger rounded-pill">order</a>
                    </div> <!- Menu Item ->
    -->

    <footer class="bg-dark p-3 text-center mt-5">
        <p class="h6 text-white">
            &copy; Copyright 2022 BcMensa.
            All Rights Reserved
        </p>
    </footer><!-- End Footer -->
 
</body>
</html>