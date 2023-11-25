<?php
use common\models\Pizza;
use common\models\Size;
use common\models\User;

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Pizza Spot';
$meatPizzas = Pizza::find()->where(['categoryId' => 1])->all();
$vegPizzas = Pizza::find()->where(['categoryId' => 2])->all();
$sizes = Size::find()->all();


?>
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
    <a href="#menu"><i class="fas fa-arrow-circle-up mb-5 h2"></i>
    </a>
    <h3 class="mb-4">Meat Pizzas</h3>
    <div class="row">
        <?php foreach ($meatPizzas as $pizza): ?>

            <div class="col-lg-3 col-md-6 mb-4">
                <div id="<?= Html::encode($pizza->pizzaId) ?>" class="card pizza">
                    <div class="card-body p-0">

                        <img src=" <?= Html::encode(Url::to('/Ridgeways-Pizza/backend/web/' . $pizza->pizzaImage)) ?>"
                            class="card-img" alt="<?= Html::encode($pizza->pizzaName) ?>">
                    </div>
                    <div class="card-footer text-dark pl-5 pr-5 pt-4">
                        <h4 class="font-weight-bold">
                            <?= Html::encode($pizza->pizzaName) ?>
                        </h4>
                        <p class="lead">
                            <?= Html::encode($pizza->description) ?>
                        </p>
                        <button type="button" class="btn btn-primary btn-add-to-cart" data-pizza-id="<?= $pizza->pizzaId ?>"
                            data-toggle="modal" data-target="#addToCartModal">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div id="veggie" class="container-fluid position-relative p-4 pt-5 text-center">
    <a href="#menu"><i class="fas fa-arrow-circle-up mb-5 h2"></i></a>
    <h3 class="mb-4">Vegetarian Pizzas</h3>
    <div class="row" style="max-width: 900px;">
        <?php foreach ($vegPizzas as $pizza): ?>

            <div class="col-md-6 mb-4">
                <div id="<?= Html::encode($pizza->pizzaId) ?>" class="card pizza">
                    <div class="card-body p-0">

                        <img src=" <?= Html::encode(Url::to('/Ridgeways-Pizza/backend/web/' . $pizza->pizzaImage)) ?>"
                            class="card-img" alt="<?= Html::encode($pizza->pizzaName) ?>">
                    </div>
                    <div class="card-footer text-dark pl-5 pr-5 pt-4">
                        <h4 class="font-weight-bold">
                            <?= Html::encode($pizza->pizzaName) ?>
                        </h4>
                        <p class="lead">
                            <?= Html::encode($pizza->description) ?>
                        </p>
                        <button type="button" class="btn btn-primary btn-add-to-cart" data-pizza-id="<?= $pizza->pizzaId ?>"
                            data-toggle="modal" data-target="#addToCartModal">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Modal for adding to cart -->
<div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="addToCartModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel">Add Pizza to Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to select quantity and size -->
                <form id="addToCartForm">
                    <input type="hidden" id="selectedPizzaId" name="selectedPizzaId">
                    <div class="form-group">
                        <label for="quantity" style="color:black;">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                    </div>
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
                        value="<?= Yii::$app->request->getCsrfToken() ?>" S />
                    <div class="form-group">
                        <label for="size" style="color:black;">Size:</label>
                        <select class="form-control" id="size" name="size" required>
                            <?php foreach ($sizes as $size): ?>
                                <option value="<?= $size->sizeId ?>">
                                    <?= Html::encode($size->sizeName) ?> -
                                    <?= Html::encode($size->price) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.btn-add-to-cart').on('click', function () {
            var pizzaId = $(this).data('pizza-id');
            $('#selectedPizzaId').val(pizzaId);
            console.log("pizzaId", pizzaId);
        });

        $('#addToCartForm').on('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '<?= Url::to(['/site/add-to-cart']) ?>', // Update this URL with your Yii2 action URL
                data: formData,
                success: function (response) {
                    // Handle success response here
                    console.log(response);
                    $('#addToCartModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Item added to cart successfully.',
                    });
                },
                error: function (xhr, status, error) {
                    // Handle error response here
                    console.error(xhr.responseText);
                    alert('An error occurred while adding to cart. Please try again.');
                }
            });
        });
    });

</script>