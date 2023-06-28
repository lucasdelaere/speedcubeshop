<x-layouts.backend>
    <x-slot name="title">Orders</x-slot>
    @if (session('alert'))
        <x-backend.alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">Order</x-slot>
        </x-backend.alert>
    @endif

    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <p class="rounded bg-primary m-0 d-flex align-self-center p-2 text-white">
                {{$orders->total()}}
            </p>
            <h1>| Orders</h1>
        </div>
    </div>

    <table class="table table-striped table-responsive shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <thead>
        <tr>
            <th>Id</th>
            <th>Status</th>
            <th>Total price</th>
            <th>User id</th>
            <th>Address</th>
            <th>Postal Code</th>
            <th>City</th>
            <th>Country</th>
            <th>Phone number</th>
            <th>Session id</th>
            <th>Payment id</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)

            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->postal_code}}</td>
                <td>{{$order->city}}</td>
                <td>{{$order->country}}</td>
                <td>{{$order->phone_number}}</td>
                <td>{{Str::limit($order->session_id) }}</td>
                <td>{{$order->payment_intent}}</td>
                <td>{{$order->created_at ? $order->created_at->diffForHumans() : ''}}</td>
                <td>{{$order->updated_at ? $order->updated_at->diffForHumans() : ''}}</td>
                <td>{{$order->deleted_at ? $order->deleted_at->diffForHumans() : ''}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
    {{$orders->links()}}
</x-layouts.backend>


