<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<!-- <div id="main" class="container-fluid p-0 vh-100 overflow-hidden position-relative">


</div> -->
<div id="menu" class="container-fluid position-relative p-4 pt-5 text-center">
    <a href="#main"><i class="fas fa-arrow-circle-up mb-5 h2"></i></a>
    <h3 class="mb-4">Choose a menu.</h3>
    <div class="row" style="max-width: 900px;">
        <div class="col-md-6 mb-4">
            <a href="#meat">
                <div class="bg-danger text-white h4 m-0 p-3">
                    <p class="mt-3">Meat Pizzas</p>
                    <p><i class="fas fa-arrow-circle-right"></i></p>
                </div>
            </a>

        </div>
        <div class="col-md-6 mb-4">
            <a href="#veggie">
                <div class="bg-success text-white h4 m-0 p-3">
                    <p class="mt-3">Vegetarian Pizzas</p>
                    <p><i class="fas fa-arrow-circle-right"></i></p>
                </div>
            </a>
        </div>
    </div>
</div>
<div id="meat" class="container-fluid position-relative p-4 pt-5 text-center">
    <a href="#menu"><i class="fas fa-arrow-circle-up mb-5 h2"></i></a>
    <h3 class="mb-4">Meat Pizzas</h3>
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div id="pepperoni" class="card pizza">
                <div class="card-body p-0">
                    <img src="assets/pepperoni.png" class="card-img" alt="pepperoni">
                </div>
                <div class="card-footer text-dark pl-5 pr-5 pt-4">
                    <h4 class="font-weight-bold">Pepperoni</h4>
                    <p class="lead">Pork-beef salami with grilled tomatoes.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div id="hawaiian" class="card pizza">
                <div class="card-body p-0">
                    <img src="assets/hawaiian.jpg" class="card-img" alt="hawaiian">
                </div>
                <div class="card-footer text-dark pl-5 pr-5 pt-4">
                    <h4 class="font-weight-bold">Hawaiian</h4>
                    <p class="lead">Ham with grilled pineapple and rich tomato sauce</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div id="bbq-chicken" class="card pizza">
                <div class="card-body p-0">
                    <img src="assets/bbq-chicken.jpg" class="card-img" alt="bbq chicken">
                </div>
                <div class="card-footer text-dark pl-5 pr-5 pt-4">
                    <h4 class="font-weight-bold">BBQ Chicken</h4>
                    <p class="lead">Saucy chicken with fresh onion rings</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div id="beef" class="card pizza">
                <div class="card-body p-0">
                    <img src="assets/beef.jpeg" class="card-img" alt="beef mince">
                </div>
                <div class="card-footer text-dark pl-5 pr-5 pt-4">
                    <h4 class="font-weight-bold">Beef Mince</h4>
                    <p class="lead">Spicy minced beef with diced tomatoes </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="veggie" class="container-fluid position-relative p-4 pt-5 text-center">
    <a href="#menu"><i class="fas fa-arrow-circle-up mb-5 h2"></i></a>
    <h3 class="mb-4">Vegetarian Pizzas</h3>
    <div class="row" style="max-width: 900px;">
        <div class="col-md-6 mb-4">
            <div id="mushroom" class="card pizza">
                <div class="card-body p-0">
                    <img src="assets/mushroom.jpg" class="card-img" alt="pepperoni">
                </div>
                <div class="card-footer text-dark pl-5 pr-5 pt-4">
                    <h4 class="font-weight-bold">Mushroom</h4>
                    <p class="lead">Sliced mushrooms seasoned with thyme, oregano, and olive oil</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div id="eggplant" class="card pizza">
                <div class="card-body p-0">
                    <img src="assets/eggplant.jpg" class="card-img" alt="hawaiian">
                </div>
                <div class="card-footer text-dark pl-5 pr-5 pt-4">
                    <h4 class="font-weight-bold">Eggplant</h4>
                    <p class="lead">Chopped eggplant with minced garlic and extra-virgin olive oil</p>
                </div>
            </div>
        </div>
    </div>
</div>