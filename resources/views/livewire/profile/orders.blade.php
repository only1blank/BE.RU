<div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($orders->isEmpty())
        <div class="bg-gray-100 p-6 rounded-lg text-center">
            <p class="text-gray-600">У вас пока нет заказов.</p>
            <p class="text-gray-500 mt-2">Оформите заказ, чтобы увидеть их здесь!</p>
        </div>
    @else
        <div class="cards">
            <h1 class="orders__title">Мои заказы</h1>
            <div class="cards__row">
                @foreach ($orders as $order)
                    <div class="cards__row_item">
                        <div class="cards__item-content">
                            <div class="cards__item-image">
                                <img src="{{ asset('img/cardboard box with stickers.svg')}}" alt="Посылка">
                            </div>
                            <div class="cards__item-info">
                                <h2>Откуда: {{ $order->from }}</h2>
                                <p>Куда: {{ $order->to }}</p>
                                <p>Размер посылки: {{ $order->package_size }}</p>
                                <p>Статус: <span class="status-{{ strtolower($order->status) }}">{{ $order->status }}</span></p>
                                <p>Трек-номер: {{$order->tracking_id}}</p>
                            </div>

                            <button class="cards__item-button" data-order-id="{{ $order->id }}"
                                data-order-status="{{ $order->status }}">
                                @if ($order->status === 'Оплачено')
                                    Позвонить курьеру
                                @else
                                    Оплатить
                                @endif
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="modal-title">Оплата заказа</h2>
            <form id="paymentForm" class="payment-form">
                @csrf
                <input type="hidden" id="orderId" name="order_id">
                <div id="cardElement" class="card-element">

                </div>
                <button type="submit" id="submitPayment" class="submit-button">Оплатить</button>
            </form>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env("STRIPE_KEY") }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            hidePostalCode: true,
        });
        cardElement.mount('#cardElement');


        document.querySelectorAll('.cards__item-button').forEach(button => {
            button.addEventListener('click', function () {
                const orderId = this.getAttribute('data-order-id');
                const orderStatus = this.getAttribute('data-order-status');

               
                if (orderStatus === 'Оплачено') {
                    alert('Заказ уже оплачен. Позвоните курьеру для уточнения деталей.');
                    return; 
                }

               
                document.getElementById('orderId').value = orderId;
                document.getElementById('paymentModal').style.display = 'block';
            });
        });

        document.querySelector('.close').addEventListener('click', function () {
            document.getElementById('paymentModal').style.display = 'none';
        });

        document.getElementById('paymentForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const { error, paymentMethod } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            });

            if (error) {
                alert(error.message);
            } else {
                const orderId = document.getElementById('orderId').value;
                fetch('/pay', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({ payment_method_id: paymentMethod.id, order_id: orderId })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Оплата прошла успешно!');
                            document.getElementById('paymentModal').style.display = 'none';
                            location.reload();
                        } else {
                            alert('Ошибка оплаты: ' + data.message);
                        }
                    });
            }
        });
    </script>

</div>