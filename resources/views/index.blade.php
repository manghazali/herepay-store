<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ trans('panel.site_title') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .swiper {
            width: 100%;
            padding-top: 30px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
        }

        .card {
            width: 18rem;
        }

        .banner {
            background-image: url('img/shopping-online-banner.jpg');
            background-size: cover;
            height: 600px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .banner h1 {
            padding: 20px;
            border-radius: 10px;
        }

        .btn-default {
            color: #fff;
            background-color: #f4b2b9;
            border-color: #f4b2b9;
        }

        .btn-default:hover {
            color: #fff;
            background-color: rgb(248, 120, 133);
            border-color: rgb(248, 120, 133);
        }

        .card-img-top {
            height: 300px;

        }
    </style>
</head>

<body>

    <!-- Banner Section -->
    <div class="banner bg-teraju position-relative">
        <div class="position-absolute top-0 end-0 m-3 d-flex gap-2">
            <a href="{{ route('login') }}" class="btn" style="font-weight: bold;color:#fff">Login</a> |
            <a href="{{ route('register') }}" class="btn" style="font-weight: bold;color:#fff">Register</a>
        </div>
        <!-- <h1 style="text-transform: uppercase">HerePay Store</h1> -->
    </div>

    <div class="container py-5">
        <h2 class="mb-4 text-center">Our Products</h2>
        <div class="mb-4 text-end">
            <a href="javascript:void(0);" class="btn btn-light btn-lg position-relative" data-bs-toggle="modal" data-bs-target="#cartModal">
                <i class="fas fa-shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cartCount">0</span>
            </a>
        </div>

        <div class="swiper bsb-team-pro-2 swiper-initialized swiper-horizontal swiper-backface-hidden">
            <div class="swiper-wrapper">

                @foreach($products as $product)
                <div class="swiper-slide">
                    <div class="card text-center">
                        <img src="{{ $product->photo ? $product->photo->url : asset('img/default.png') }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title" style="text-transform: uppercase">{{ $product->name }}</h5>
                            <h5 class="card-title" style="text-transform: uppercase">RM {{ $product->price }}</h5>
                            <!-- Add to Cart button with data-id -->
                            <a href="javascript:void(0);" class="btn btn-success add-to-cart" data-name="{{ $product->name }}" data-price="{{ $product->price }}">
                                ADD TO CART
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Swiper navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- Swiper pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="checkoutForm" action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cartModalLabel">Your Cart</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Customer Info -->
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Name</label>
                            <input type="text" id="customerName" name="customer_name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="customerEmail" class="form-label">Email</label>
                            <input type="email" id="customerEmail" name="customer_email" class="form-control" placeholder="Enter your email" required>
                        </div>

                        <!-- Hidden input for cart items -->
                        <input type="hidden" name="cart_items" id="cartItemsInput">

                        <!-- Cart Items -->
                        <ul id="cartItems" class="list-group mb-3"></ul>

                        <!-- Total Price -->
                        <h5 class="text-end">Total: RM <span id="cartTotal">0.00</span></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Go to Checkout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        let cart = [];

        // Add to cart
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const name = this.dataset.name;
                const price = parseFloat(this.dataset.price);
                cart.push({ name, price });

                // Update cart count
                document.getElementById('cartCount').textContent = cart.length;

                // Update modal list and total
                const cartList = document.getElementById('cartItems');
                cartList.innerHTML = '';
                let total = 0;
                cart.forEach(item => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                    li.textContent = item.name;
                    const span = document.createElement('span');
                    span.textContent = 'RM ' + item.price.toFixed(2);
                    li.appendChild(span);
                    cartList.appendChild(li);
                    total += item.price;
                });
                document.getElementById('cartTotal').textContent = total.toFixed(2);
            });
        });

        // Fill hidden input before submitting form
        document.getElementById('checkoutForm').addEventListener('submit', function() {
            document.getElementById('cartItemsInput').value = JSON.stringify(cart);
        });

        // Initialize Swiper
        const swiper = new Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: { el: '.swiper-pagination', clickable: true },
            breakpoints: {
                576: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                992: { slidesPerView: 3 },
                1200: { slidesPerView: 4 },
            }
        });
    </script>
</body>

</html>