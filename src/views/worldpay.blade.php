<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>WorldPay Online Payment</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script>
        $(document).ready(function() {
// Setup the WorldPay JS Environment
var worldPayKey = "<?php echo config('worldpay.sandbox.service'); ?>";
var form = document.getElementById('bookingForm');
Worldpay.useOwnForm({
    'clientKey': worldPayKey,
    'form': form,
    'reusable': false,
    'callback': function (status, response) {
        $('#paymentErrors').html('');
        if (response.error) {
            Worldpay.handleError(form, $('#paymentErrors'), response.error);
            $('input[type="submit"]').prop('disabled', false);
        } else {
            var token = response.token;
            Worldpay.formBuilder(form, 'input', 'hidden', 'token', token);
            form.submit();
        }
    }
});
});
</script>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3>Laravel WorldPay Online <span class="ml-auto" style="font-size: 12px">by <a href="https://jaythegeek.io" target="_blank">@jaythegeek</a></span></h3>
                <p><a href="https://github.com/jaythegeek/laravel-worldpay" target="_blank">https://github.com/jaythegeek/laravel-worldpay</a><br><a href="https://developer.worldpay.com" target="_blank">https://developer.worldpay.com</a></p>
                <hr width="50%" align="left" class="mt-5">
                <span id="paymentErrors" class="bg-danger"></span>
            </div>
        </div>
    </div>

    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form class="" action="<?php echo url('charge') ?>" method="post" id="bookingForm" enctype="multipart/form-data" autocomplete="off">
                    <!-- This is for Laravel Security -->
                    {{ csrf_field() }}

                    <div class="form-row my-3">
                        <div class="col">
                        <label>Full Name</label>
                        <input placeholder="Miss J Bloggs" name="cardName" data-worldpay="name" type="text" required="required" class="form-control">
                    </div>
                    </div>

                    <div class="form-row my-3">
                        <div class="col">
                        <label>Card Number</label>
                        <input placeholder="4444 &middot;&middot;&middot;&middot; &middot;&middot;&middot;&middot; &middot;&middot;&middot;&middot;" type="text" size="20" data-worldpay="number" required="required" class="form-control">
                    </div>
                    </div>

                    <div class="form-row my-3">
                        <div class="col">
                        <label>Expiry Date</label>
                        <input type="text" data-worldpay="exp-year" placeholder="01/2049" required="required" class="form-control">
                    </div>

                    <div class="col">
                        <label>CVV</label>
                        <input placeholder="CVV" type="text" size="4" data-worldpay="cvc" required="required" class="form-control">
                    </div>
                    </div>

                    <div class="form-row my-3">
                        <div class="col-md-12 text-right">
                        <input type="submit" class="btn btn-large btn-outline-primary" value="Complete Payment">
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <!-- WorldPay Online Script -->
    <script type="text/javascript" src="https://cdn.worldpay.com/v1/worldpay.js"></script>
</body>
</html>
