<!DOCTYPE html>
<html>
<base href="/public">
<head>
    <title>Boucherie du marché</title>
    @include('user.css')
    <style>
        .rowq {
  display: -ms-flexbox; /* IE10 */
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}


.containerq {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
  margin-bottom: 5%;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #000000 !important;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #f70202 !important;
}

    </style>
</head>
<body>

@include('user.navbar')

<div
style=
"position: relative;
text-align: center;
padding-top: 90px;"
     class="container ">

    <h1 style="font-size: 40px" class="text-center font-weight-bold mt-3 mb-4">Paiement avec Stripe</h1>

    <div class="rowq">
        <div class="col-md-12 col-md-offset-3">


                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <div class="col-75">
                    <div class="containerq">
                        <h3>Montant du paiement : {{$sum}} €</h3>
                        <hr>
                        <label for="fname">Cartes acceptées</label>
                        <div class="icon-container">
                          <i class="fa fa-cc-visa" style="color:navy;"></i>
                          <i class="fa fa-cc-amex" style="color:blue;"></i>
                          <i class="fa fa-cc-mastercard" style="color:red;"></i>
                          <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <hr>
                    <form
                            role="form"
                            action="{{ route('stripe.post',$sum) }}"
                            method="post"
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf

                        <div class='rowq'>
                            <div class='col-xs-12 col-6 m-auto form-group required'>
                                <label class='control-label'>Nom de votre carte</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>

                        <div class='rowq'>
                            <div class='col-xs-12 col-6 m-auto form-grouprequired'>
                                <label class='control-label'>Numéro de votre carte</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>

                        <div class='d-flex justify-content-center'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Mois d'expiration</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Année d'expiration</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>


                        <div class="rowq">
                            <div class="col-xs-12 col-6 m-auto">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Payer</button>
                            </div>
                        </div>

                    </form>
                </hr>
            </hr>
        </div>
    </div>

</div>

@include('user.footer')

</body>

@include('user.script')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

$(function() {

    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/

    var $form = $(".require-validation");

    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });

        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }

    });

    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];

            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
</script>
</html>
