<div>
    <form action="{{ route('cart.store', $product) }}" method="POST">
        @csrf
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="input-group w-60">
                <button wire:click="updateQuantity(-1)" class="btn btn-light btn-outline-secondary" type="button">-</button>
                <input type="number" value="{{$quantity}}" min="1" class="form-control text-center" id="quantity"
                       name="quantity"/>
                <button wire:click="updateQuantity(+1)" class="btn btn-light btn-outline-secondary" type="button">+</button>
            </div>
            <i class="bi bi-heart"></i>
        </div>
        <button type="submit" class="btn-green w-100">ADD TO CART</button>
    </form>
</div>
