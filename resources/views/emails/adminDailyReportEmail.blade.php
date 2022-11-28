@extends('emails.layouts.app')

@section('content')

    <h2>Tiendas con poca cantidad de assets:</h2>
    @forelse($dangerStock as $tienda)
        @if(count($tienda->stocks) > 0)
            <h3>{{ $tienda->name }}</h3>
            <ul>
                @foreach ($tienda->stocks as $stock)
                    <li>{{ $stock->asset->name . ': ' . $stock->current_stock }} left</li>
                @endforeach
            </ul>
        @endif
    @empty
        <h3>There are no danger in stock yet.</h3>
    @endforelse

    <h2>Changes in the amounts for last 24 hours:</h2>
    @if(count($transactions) > 0)
        <table style="border: 1px solid #ddd;border-collapse: collapse;">
            <thead>
                <th style="border: 1px solid #ddd;width: 200px">Tienda</th>
                <th style="border: 1px solid #ddd;width: 200px">Asset</th>
                <th style="border: 1px solid #ddd;width: 200px">Items of transactions</th>
                <th style="border: 1px solid #ddd;width: 100px">Items left</th>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    @if($loop->index == 10)
                        @break;
                    @endif
                    <tr>
                        <td style="border: 1px solid #ddd;">{{ $transaction->team->name }}</td>
                        <td style="border: 1px solid #ddd;">{{ $transaction->asset->name }}</td>
                        <td style="border: 1px solid #ddd;">{{ $transaction->sum }}</td>
                        <td style="border: 1px solid #ddd;">{{ $transaction->current_stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($transactions) > 10)
            <p><a href="{{ route('admin.transactions.index') }}">Log in to view more transactions</a></p>
        @endif
    @else
        <h3>No hay transacciones hechas en las ultimas 24 horas.</h3>
    @endif
@endsection
