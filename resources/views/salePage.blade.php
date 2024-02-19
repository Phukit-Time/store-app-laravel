<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Page</title>
</head>
<body>
    <h1>Welcome to the Sale Page</h1>
        <!-- Form to sell items -->
        <h2>Sell Items</h2>
    <ul>
        @foreach ($items as $item)
        <li>
            {{ $item->name }} - Price: ${{ $item->price }} - Quantity: {{ $item->quantity }}
            <form method="POST" action="{{ route('sell.item', ['itemId' => $item->id]) }}">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <label for="sell-quantity-{{ $item->id }}">Quantity to Sell:</label>
                <input type="number" id="sell-quantity-{{ $item->id }}" name="quantity" required>
                <button type="submit">Add to SellLineItem</button>
            </form>
        </li>
        @endforeach
    </ul>
    <a href="/" class="btn btn-primary">Back</a>

</body>
</html>