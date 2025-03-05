@extends('fixed.master2')
@section('content1')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Welcome {{ Auth::user()->name }}</p>
                    <h1>Payment</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Invoice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .payment-form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .payment-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .payment-form button {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="payment-form">
            <h2>Pay Now</h2>
            <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
                @csrf
                <div class="form-group">
                    <label for="amount">Payment amount</label>
                    <input type="text" class="form-control" id="amount" value="${{ number_format($totalAmount, 2) }}" readonly>
                    <input type="hidden" name="amount" value="{{ $totalAmount }}">
                </div>
                <div class="form-group">
                    <label for="card-holder-name">Name on card</label>
                    <input type="text" class="form-control" id="card-holder-name" placeholder="Name on card">
                </div>
                <div class="form-group">
                    <label for="card-element">Card number</label>
                    <div id="card-element" class="form-control">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>
                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Pay ${{ number_format($totalAmount, 2) }}</button>
            </form>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Set up Stripe.js and Elements to use in checkout form
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        var card = elements.create('card', { style: style });
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        }
    </script>
</body>
</html>
@endsection