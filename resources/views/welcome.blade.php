<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to the Store</h1>

    <!-- Form to add items -->
    <form method="POST" action="{{ route('store.item') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>
        </div>
        <button type="submit">Add Item</button>
    </form>
    <a href="{{ route('sale.page') }}" class="btn btn-primary">Open Sale</a>

    <!-- Form to sell items -->
    <h2>Sell Items</h2>
    <ul>
        @foreach ($items as $item)
        <li>
            {{ $item->name }} - Price: ${{ $item->price }} - Quantity: {{ $item->quantity }}
        </li>
        @endforeach
    </ul>
</body>
</html>
