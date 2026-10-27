<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarrerak erosi</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f5f4;
            color: #111827;
            font-family: Arial, Helvetica, sans-serif;
        }

        button,
        input {
            font: inherit;
        }

        .purchase-page {
            width: min(1096px, calc(100% - 32px));
            margin: 0 auto;
            padding: 24px 0 64px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 36px;
            color: #b91c1c;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }

        h1 {
            margin: 20px 0;
            font-size: clamp(28px, 4vw, 38px);
            font-weight: 800;
        }

        .ticket-layout {
            display: grid;
            grid-template-columns: minmax(0, 2.15fr) minmax(280px, 1fr);
            align-items: start;
            gap: 24px;
        }

        .purchase-steps {
            display: flex;
            min-width: 0;
            flex-direction: column;
            gap: 20px;
        }

        .ticket-card {
            display: flex;
            flex-direction: column;
            gap: 16px;
            padding: 24px;
            border: 1px solid #e7e5e4;
            border-radius: 14px;
            background: #fff;
        }

        .ticket-card h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .quantity-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 16px;
        }

        .quantity-control {
            display: flex;
            overflow: hidden;
            align-items: center;
            border: 1px solid #aeb4c0;
            border-radius: 10px;
        }

        .quantity-control button {
            width: 48px;
            height: 48px;
            border: 0;
            background: #f3f4f6;
            color: #111827;
            cursor: pointer;
            font-size: 22px;
            font-weight: 700;
        }

        .quantity-control button:disabled {
            color: #6b7280;
            cursor: default;
        }

        .quantity-value {
            min-width: 56px;
            text-align: center;
            font-size: 22px;
            font-weight: 700;
        }

        .price-note {
            color: #4b5563;
            font-size: 14px;
        }

        .payment-fields {
            display: grid;
            gap: 16px;
        }

        .payment-fields label {
            display: grid;
            gap: 8px;
            color: #4b5563;
            font-size: 13px;
            font-weight: 700;
        }

        .payment-fields input {
            width: 100%;
            height: 44px;
            padding: 0 12px;
            border: 1px solid #aeb4c0;
            border-radius: 8px;
            background: #fff;
            color: #111827;
        }

        .payment-fields input:focus {
            border-color: #b91c1c;
            outline: 2px solid #fecaca;
        }

        .expiry-fields {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .order-summary {
            display: flex;
            flex-direction: column;
            gap: 16px;
            padding: 24px;
            border-radius: 14px;
            background: #111827;
            color: #fff;
        }

        .summary-label {
            color: #fca5a5;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .event-title {
            font-size: 21px;
            font-weight: 700;
            line-height: 1.25;
        }

        .event-detail,
        .prototype-note {
            color: #d1d5db;
        }

        .order-line,
        .order-total {
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        .order-line {
            padding-top: 14px;
            border-top: 1px solid #374151;
            color: #d1d5db;
        }

        .order-total {
            font-size: 20px;
            font-weight: 800;
        }

        .pay-button {
            min-height: 52px;
            border: 0;
            border-radius: 9px;
            background: #b91c1c;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            font-weight: 700;
        }

        .prototype-note {
            font-size: 13px;
        }

        @media (max-width: 720px) {
            .ticket-layout {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <main class="purchase-page">
        <a class="back-link" href="{{ url('/') }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M15 18l-6-6 6-6"></path>
            </svg>
            Ekitaldira itzuli
        </a>

        <h1>Sarrerak erosi</h1>

        <div class="ticket-layout">
            <div class="purchase-steps">
                <section class="ticket-card" aria-labelledby="quantity-heading">
                    <h2 id="quantity-heading">1. Sarrera kopurua</h2>
                    <div class="quantity-row">
                        <div class="quantity-control" aria-label="Sarrera kopurua">
                            <button id="decrease-quantity" type="button" aria-label="Sarrera bat gutxiago" disabled>−</button>
                            <span id="ticket-quantity" class="quantity-value" aria-live="polite">1</span>
                            <button id="increase-quantity" type="button" aria-label="Sarrera bat gehiago">+</button>
                        </div>
                        <span class="price-note">10 € sarrera bakoitza</span>
                    </div>
                </section>

                <section class="ticket-card" aria-labelledby="payment-heading">
                    <h2 id="payment-heading">2. Ordainketa</h2>
                    <div class="payment-fields">
                        <label>
                            Txartelaren titularra
                            <input type="text" autocomplete="cc-name">
                        </label>
                        <label>
                            Txartel zenbakia
                            <input type="text" inputmode="numeric" autocomplete="cc-number"
                                placeholder="0000 0000 0000 0000">
                        </label>
                        <div class="expiry-fields">
                            <label>
                                Iraungitze data
                                <input type="text" autocomplete="cc-exp" placeholder="HH/UU">
                            </label>
                            <label>
                                CVV
                                <input type="text" inputmode="numeric" autocomplete="cc-csc" placeholder="123">
                            </label>
                        </div>
                    </div>
                </section>
            </div>

            <aside class="order-summary" aria-label="Erosketaren laburpena">
                <span class="summary-label">Laburpena</span>
                <span class="event-title">Bertso saioa: udazkeneko jaialdia</span>
                <span class="event-detail">Urriak 24, larunbata · 19:00</span>
                <span class="event-detail">Areto nagusia</span>
                <div class="order-line">
                    <span><span id="summary-quantity">1</span> × 10 €</span>
                    <span id="line-total">10 €</span>
                </div>
                <div class="order-total">
                    <span>Guztira</span>
                    <span id="order-total">10 €</span>
                </div>
                <button class="pay-button" type="button">Ordaindu <span id="pay-total">10 €</span></button>
                <span class="prototype-note">Prototipoa: ez da benetako ordainketarik egiten.</span>
            </aside>
        </div>
    </main>

    <script>
        const quantityDisplay = document.getElementById('ticket-quantity');
        const summaryQuantity = document.getElementById('summary-quantity');
        const decreaseButton = document.getElementById('decrease-quantity');
        const increaseButton = document.getElementById('increase-quantity');
        const unitPrice = 10n;
        let quantity = 1n;

        function formatEuro(amount) {
            return `${amount.toLocaleString('eu-ES')} €`;
        }

        function updateSummary() {
            const total = quantity * unitPrice;
            const formattedTotal = formatEuro(total);

            quantityDisplay.textContent = quantity.toLocaleString('eu-ES');
            summaryQuantity.textContent = quantity.toLocaleString('eu-ES');
            document.getElementById('line-total').textContent = formattedTotal;
            document.getElementById('order-total').textContent = formattedTotal;
            document.getElementById('pay-total').textContent = formattedTotal;
            decreaseButton.disabled = quantity === 1n;
        }

        decreaseButton.addEventListener('click', () => {
            if (quantity > 1n) {
                quantity -= 1n;
                updateSummary();
            }
        });

        increaseButton.addEventListener('click', () => {
            quantity += 1n;
            updateSummary();
        });
    </script>
</body>

</html>
