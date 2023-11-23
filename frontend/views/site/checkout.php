<?php

/** @var yii\web\View $this */

$this->title = 'Pizza Spot';
?>
<div class="container mt-5">
    <div class="card mx-auto text-dark" style="max-width: 500px;" id="pickup-option">
        <div class="card-body">
            <h3 class="text-center mb-4">Choose a pickup option.</h3>
            <table class="table mx-auto table-sm table-borderless">
                <tbody>
                    <tr>
                        <td class="w-75 text-left pl-5"><label for="deliver">Deliver to an address.</label></td>
                        <td class="w-25"><input class="ml-3" type="radio" id="deliver" name="pickup-option"></td>
                    </tr>
                    <tr>
                        <td class="w-75 text-left pl-5"><label for="pickup">Pick it up from us.</label></td>
                        <td class="w-25"><input class="ml-3" type="radio" id="pickup" name="pickup-option"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <p class="text-center text-danger" id="error2"></p>
            <button class="btn btn-primary" id="delivery">Next <i class="fas fa-arrow-right ml-3"></i></button>
        </div>
    </div>
</div>
<div id="pick-address" class="container mt-0" style="display: none;">
    <div class="jumbotron w-100 mx-auto bg-transparent text-center pt-0 mt-0">
        <h1 id="location" class="font-weight-bold">Here is where you'll find us.</h1>
        <div class="container-fluid p-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1552.765909838821!2d36.78375468231014!3d-1.3004808360099789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1a6bf7445dc1%3A0x940b62a3c8efde4c!2sMoringa%20School!5e0!3m2!1sen!2ske!4v1582992240822!5m2!1sen!2ske"
                allowfullscreen=""></iframe>
            <button type="button" class="btn btn-success mt-4 place-order">Place Order</button>
        </div>
    </div>
</div>
<div class="container" id="deliver-address" style="display: none; max-width: 500px;">
    <h3 class="text-center font-weight-bold">Enter your address</h3>
    <form class="text-center place-order">
        <input required type="text" class="d-block m-3 btn btn-light w-100 mx-auto text-left"
            placeholder="Address Line 1">
        <input type="text" class="d-block m-3 btn btn-light w-100 mx-auto text-left" placeholder="Address Line 2">
        <input required type="text" class="d-block w-100 m-3 btn btn-light mx-auto text-left" placeholder="City">
        <input required type="text" class="d-block w-100 m-3 btn btn-light mx-auto text-left" placeholder="County">
        <button type="submit" class="btn btn-success mt-4">Place Order</button>
    </form>
</div>