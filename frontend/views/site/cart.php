<?php

/** @var yii\web\View $this */

$this->title = 'Cart';
?>
<div class="container pt-4 d-flex flex-wrap justify-content-center" style="max-width: 500px;">
    <div class="card mx-auto mb-3 text-dark" style="width: 100%;">
        <div class="card-body w-100">
            <h3 class="font-weight-bold text-center">Cart Items</h3>
            <div id="cart-items" class="lead mt-5 mb-4">
                <table class="table table-borderless table-sm text-dark">
                    <tbody id="insertItems">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <table class="table table-borderless table-sm m-0">
                <tbody>
                    <tr>
                        <th scope="row">Total</th>
                        <td class="text-right"><span id="total-amount">KES 0.00</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <button class="btn btn-info text-center lead m-3" id="testing" onclick="window.history.back()"><a><i
                    class="fas fa-arrow-circle-left mr-3"></i>Back</a></button>
        <button id="clear-cart" onclick="localStorage.removeItem('order'); location.reload()" class="btn btn-danger"><i
                class="fas fa-times-circle mr-3"></i>Clear Cart</button>
        <button type="button" class="btn btn-primary text-center lead m-3" id="checkout"
            onclick="location.assign('checkout.html')">Checkout<a href="#main"><i
                    class="fas fa-arrow-circle-right ml-3"></i></a></button>
    </div>
</div>