<?php
session_start();
?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="#"><i class='bx bxs-cake' style="color: #ffce3a;"></i>Bakerz Bite</a></h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About Us</a></li>
                <li><a class="nav-link scrollto " href="#gallery">Gallery</a></li>


                <li><a class="nav-link scrollto " href="#!/products"><i class='bx bx-baguette' style="font-size: 16px;"></i> Products</a></li>

                <li class="dropdown"><a href="#!/customer"><span> <i class='bx bxs-user' style="font-size: 16px;"></i>
                            {{customer}} </span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#!/login"> {{customer1}} </a></li>
                        <li><a href="#!/signup"> {{customer2}} </a></li>
                        <li><a href="#!/cart"> {{customer3}} </a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#!/cart"> <i class='bx bx-cart' style="font-size: 20px;"></i>
                        Cart &nbsp;<div class="cart-number text-center">{{cartnumber}}</div> </a></li>
                <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2><i class='bx bx-cart'></i> Your Cart</h2>
                <ol>
                    <li><a href="#">Home</a></li>
                    <li><i class='bx bx-cart'></i> Cart</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->


    <section>
        <div class="container">
            <?php
            if (!isset($_SESSION['name'])) {
                echo " <p>Tips: <a href='#!/login'>Log In</a> or <a href='#!/signup'>Sign Up</a> now to get 5% DISCOUNT for all products and many other offers from Bakerz Bite </p>";
            }
            ?>

            <div class="table-responsive">
                <table class="col-12 table table-hover table-striped">

                    <thead>
                        <tr class="table-light">
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="cart in carts">
                            <td><img class="img-fluid" src="assets/img/products/{{cart.product_image}}"></td>
                            <td class="text-capitalize">{{cart.product_name}}</td>
                            <td><input type="number" ng-model="cart.product_quantity"></td>
                            <td>{{cart.product_price | currency}}</td>
                            <td>{{cart.product_quantity * cart.product_price | currency}}</td>
                            <td><button type="button" name="remove_product" class="btn btn-danger btn-xs" ng-click="removeItem(cart.product_id)"><i class='bx bxs-trash'></i></button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="fw-bold table-ligt">
                            <td colspan="3" align="right">Total</td>
                            <td colspan="3">{{ setTotals() | currency}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="btn-group btns-cart mt-3 col float-end" style="margin-right: 100px;">
                <button type="button" class="btn btn-warning" ng-click="back()"><i class='bx bxs-chevrons-left'></i> Continue Shopping</button>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkout"><i class='bx bxs-wallet'></i> Place Your Order <i class='bx bxs-chevrons-right'></i></button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="checkout" tabindex="-1">
                <div class="modal-dialog  modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> <i class='bx bxs-wallet'></i> Confirm your Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <?php
                                if (isset($_SESSION['name'])) {
                                    echo "";
                                } else {
                                    echo "<h5>Be our membership by <a href='#!/signup'>Sign Up</a> or <a href='#!/login'>Log In</a> now to get <b>5%</b> DISCOUNT for all products and many more <a href='#offer'>Offers</a>!</h5>";
                                } ?>
                            </p>
                            <div class="table-responsive">
                                <table class="table" style="font-size: 16px ;">

                                    <tr class="table-light">
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total </th>
                                    </tr>
                                    <tr ng-repeat="cart in carts">
                                        <td><img class="img-fluid" src="assets/img/products/{{cart.product_image}}" style="height: 40px; width: 40px;"></td>
                                        <td class="text-capitalize">{{cart.product_name}}</td>
                                        <td>{{cart.product_quantity}}</td>
                                        <td>{{cart.product_price | currency}}</td>
                                        <td> {{(cart.product_quantity * cart.product_price)  | currency}}</td>

                                    </tr>


                                    <tr class="fw-bold table-ligt">
                                        <td colspan="3" align="right">Total <span style="color:#b01453">(Membership gets 5% DISCOUNT) </span></td>
                                        <td colspan="3">
                                            <span class="text-decoration-line-through">
                                                <?php
                                                if (isset($_SESSION['cust'])) {
                                                    echo "{{ setTotals() | currency}}";
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                            </span>
                                            <?php
                                            if (isset($_SESSION['cust'])) {
                                                echo " <span style='color:#b01453'>{{ setTotals() * 95 /100 | currency}}</span>";
                                            } else {
                                                echo " {{ setTotals() | currency}}";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>


                            <div class="row">
                                <form ng-submit="submitOrder(carts, order)">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-50">
                                                <h3>Billing Address</h3>
                                                <?php
                                                if (!isset($_SESSION['cust'])) {
                                                    echo "<label><i class='fa fa-user'></i> Full Name *</label>
                                                        <input type='text'  ng-model='order.name' placeholder='Your Name (Required)' required>
                                                        <label><i class='fa fa-envelope'></i> Email *</label>
                                                        <input type='text' ng-model='order.email' placeholder='Your Email (Required)' required>";
                                                }
                                                ?>

                                                <label for="phone"><i class="bi bi-telephone-fill"></i> Phone *</label>
                                                <input type="text" ng-model="order.phone" placeholder="Your Phone Number (Required)" required>
                                                <label for="adr"><i class="fa fa-address-card-o"></i> Address *</label>
                                                <input type="text" ng-model="order.address" placeholder="Your Address (Required)" required>



                                            </div>

                                            <div class="col-50">
                                                <h3>Payment</h3>
                                                <label for="payment"><i class="bi bi-wallet-fill"></i> Payment Method * </label>
                                                <select ng-model="order.payment" ng-change="hideItem()">
                                                    <option value="">---Please select your payment method (Required)---</option>
                                                    <option value="Cash on Delivery">Cash on Delivery (COD)</option>
                                                    <option value="Debit Card"> Debit Card</option>
                                                    <option value="Credit Card"> Credit Card</option>
                                                    <option value="E-Wallet">E-Wallet</option>
                                                </select>
                                                <div ng-hide="value">
                                                    <label for="cname"><i class="bi bi-credit-card-2-front-fill"></i> Name on Card *</label>
                                                    <input type="text" name="cardname" placeholder="John  Doe">
                                                    <label for="ccnum"><i class="bi bi-credit-card-2-back-fill"></i> Card Number *</label>
                                                    <input type="text" name="cardnumber" placeholder="1111-2222-3333-4444">
                                                </div>





                                            </div>


                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Place Your Order</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</main>

<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-contact">
                    <h3><i class='bx bxs-cake'></i>Bakerz Bite</h3>
                    <p>
                        54 Le Thanh Nghi Street <br>
                        Hai Ba Trung district, Ha Noi<br>
                        Viet Nam <br><br>
                        <strong>Phone:</strong> 0523.917.089<br>
                        <strong>Email:</strong> minh.nv.2045@aptechlearning.edu.vn<br>
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Map</h4>
                    <ul>
                        <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.729556123599!2d105.84769451485397!3d21.00347528601206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad58455db2ab%3A0x9b3550bc22fd8bb!2zNTQgUC4gTMOqIFRoYW5oIE5naOG7iywgQsOhY2ggS2hvYSwgSGFpIELDoCBUcsawbmcsIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1660708139799!5m2!1sen!2s" width="340" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></li>

                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4> General</h4>
                    <ul>
                        <li><i class='bx bxs-time'></i>&nbsp; {{theTime}}</li>
                        <li><i class='bx bxs-user-plus'></i>&nbsp; Visitor Counts: {{vcounter}}</li>
                        <li><i class='bx bx-current-location'></i>&nbsp; Your Location: &nbsp;<div id="city"></div>
                            &nbsp; <div id="country"></div>
                        </li>
                        <li><i class='bx bx-signal-5'></i>&nbsp; Your IP : &nbsp;<div id="ip"></div>
                        </li>

                    </ul>
                </div>



            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Bakerz Bite</span></strong>. All Rights Reserved
            </div>
            <div class="credits">

                Designed by <a href="#">C2112L Group1 AptechVN</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="youtube"><i class='bx bxl-youtube'></i></a>
            <a href="#" class="reddit"><i class='bx bxl-reddit'></i></a>
            <a href="#" class="tiktok"><i class='bx bxl-tiktok'></i></a>

        </div>
    </div>
</footer><!-- End Footer -->



<script src="assets/js/script.js"></script>