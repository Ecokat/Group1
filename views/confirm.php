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


    <section>
        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <h1 class="logo"><i class='bx bxs-cake' style="color: #ffce3a;"></i>Bakerz Bite</h1>
                    </div>
                    <div class="invoice p-5">
                        <h5>Your Order Confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello
                            <b><?php
                                if (isset($_SESSION['cust'])) {
                                    echo $_SESSION['name'];
                                } else {
                                    echo $_SESSION['fullname'];
                                }
                                ?></b>
                        </span>
                        <p>You order has been confirmed and will be shipped in next few
                            days!</p>


                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#feedback">
                            <i class="bi bi-card-checklist"></i> Give Your Feedback Here!
                        </button>


                        <div class="modal fade" id="feedback" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Give Feedback</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>

                                            <p>We would love to hear your thoughts, suggestions, concerns or problems
                                                with anything so we can improve!</p>
                                            <form>
                                                <p>How are we doing?</p>
                                                <div ng-init="rating = star.rating + 1"></div>
                                                <div class="star-rating justify-content-center d-flex" star-rating rating-value="rating" data-max="5" on-rating-selected="rateFunction(rating)"></div>
                                                <div>

                                                    <div class="form-group mt-3">
                                                        <textarea class="form-control" ng-model="review" rows="5" placeholder="Care to share more about it?
                                                            "></textarea>
                                                    </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" ng-click="feedback()" class="btn btn-primary">Give
                                        Feedback</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#!/products">
                        <h4 class="float-end"><i class='bx bx-cart'></i> Continue Shopping <i class='bx bxs-chevrons-right'></i></h4>
                    </a>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order Date</span>
                                            <span>{{orders[0].createDate}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order No</span>
                                            <span>{{orders[0].orderid}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Phone</span>
                                            <span><?php echo $_SESSION['phone'];

                                                    ?></span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Payment</span>
                                            <span>{{orders[0].payment}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Shiping
                                                Address</span> <span>{{orders[0].address}}</span> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr ng-repeat="order in orders">
                                    <td width="20%"> <img src="assets/img/products/{{order.pimg}}" width="90">
                                    </td>
                                    <td width="60%"> <span class="font-weight-bold">{{order.pname}}</span>
                                        <div class="product-qty"> <span class="d-block">Quantity:
                                                {{order.quantity}}</span>

                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right"> <span class="font-weight-bold">{{order.quantity *
                                                order.pprice | currency}}</span>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>



                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table">
                                <tbody class="totals">
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Discount</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="text-success">{{ setTotals() -
                                                    orders[0].total | currency}}</span>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="border-top border-bottom">

                                        <td>
                                            <div class="text-left"> <span class="font-weight-bold">Total</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="font-weight-bold">{{orders[0].total|
                                                    currency }}</span>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>

                    <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p>
                    <h5>Bakerz Bite</h5>

                </div>

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