<template>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Product name</th>
                <th>Quantity in stock</th>
                <th>Price per item</th>
                <th>Datetime submitted</th>
                <th class="text-right">Total value number</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    Total: {{ sumTotal }}
                </td>
            </tr>
        </tfoot>
        <product-list-item v-for="product in products" :key="product.id" :product="product" @edit="$emit('edit', product)"></product-list-item>
    </table>
</template>
<script>
export default {
    props: ['products'],
    computed: {
        sumTotal() {
            return this.products.reduce( (acc, product) => acc + product.price * product.quantity,0 )
        }
    }
}
</script>
