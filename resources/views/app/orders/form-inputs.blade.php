@php $editing = isset($order) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $order->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $order->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="payment_ref"
            label="Payment Ref"
            :value="old('payment_ref', ($editing ? $order->payment_ref : ''))"
            maxlength="255"
            placeholder="Payment Ref"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="state"
            label="State"
            :value="old('state', ($editing ? $order->state : ''))"
            maxlength="255"
            placeholder="State"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="country"
            label="Country"
            :value="old('country', ($editing ? $order->country : ''))"
            maxlength="255"
            placeholder="Country"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="discount"
            label="Discount"
            :value="old('discount', ($editing ? $order->discount : ''))"
            max="255"
            step="0.01"
            placeholder="Discount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="payments_status" label="Payments Status">
            @php $selected = old('payments_status', ($editing ? $order->payments_status : '')) @endphp
            <option value="successful" {{ $selected == 'successful' ? 'selected' : '' }} >Successful</option>
            <option value="pending" {{ $selected == 'pending' ? 'selected' : '' }} >Pending</option>
            <option value="failed" {{ $selected == 'failed' ? 'selected' : '' }} >Failed</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="payment_response"
            label="Payment Response"
            maxlength="255"
            required
            >{{ old('payment_response', ($editing ? $order->payment_response :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="shipping_total"
            label="Shipping Total"
            :value="old('shipping_total', ($editing ? $order->shipping_total : ''))"
            max="255"
            step="0.01"
            placeholder="Shipping Total"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
