<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>WorldPay Online Payment</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- WorldPay Online Script -->
    <script type="text/javascript" src="https://cdn.worldpay.com/v1/worldpay.js"></script>

</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3>Laravel WorldPay Online <span class="ml-auto" style="font-size: 12px">by <a href="https://jaythegeek.io" target="_blank">@jaythegeek</a></span></h3>
                <p><a href="https://github.com/jaythegeek/laravel-worldpay" target="_blank">https://github.com/jaythegeek/laravel-worldpay</a><br><a href="https://developer.worldpay.com" target="_blank">https://developer.worldpay.com</a></p>
                <hr width="50%" align="left" class="mt-5">
                <span id="paymentErrors" class="bg-danger"></span>
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            </div>
        </div>
    </div>

    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="/worldpay/complete" id="bookingForm" method="post">



                    <div class="form-row my-2">
                        <div class="col">
                            <label>Name on Card</label>
                        <input data-worldpay="name" name="name" type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col">
                            <label>Card Number</label>
                        <input data-worldpay="number" size="20" type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col">
                            <label>Expiry Month (MM)</label>
                        <input data-worldpay="exp-month" size="2" type="text" class="form-control" />
                        </div>
                        <div class="col">
                            <label>Expiry Year (YYYY)</label>
                        <input data-worldpay="exp-year" size="4" type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col">
                            <label>CVC</label>
                        <input data-worldpay="cvc" size="4" type="text" class="form-control" />
                        </div>
                    </div>

                    <div class="form-row my-2 text-right">
                       <div class="col">
                            <input type="submit" value="Place Order" class="btn btn-outline-primary mt-4" />
                       </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>

    var form = document.getElementById('bookingForm');

Worldpay.useOwnForm({
  'clientKey': 'T_C_475fb1ec-99ab-4a24-8f80-f549a1f588f8',
  'form': form,
  'reusable': false,
  'callback': function(status, response) {
    document.getElementById('paymentErrors').innerHTML = '';
    if (response.error) {
        console.log(response.error);
      Worldpay.handleError(form, document.getElementById('paymentErrors'), response.error);

    } else {
      var token = response.token;
      console.log(token);
      Worldpay.formBuilder(form, 'input', 'hidden', 'token', token);
      form.submit();
    }
  }
});

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>
