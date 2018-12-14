<template>
    <tr>
        <td>{{ product.name }}</td>
        <td>{{ product.quantity }}</td>
        <td>{{ product.price }}</td>
        <td></td>
        <td class="text-right">{{ totalValue }}</td>
        <td>
            <button @click="edit">edit</button>
        </td>
    </tr>
</template>
<script>
export default {
    props: ['product'],
    data() {
        return {
        }
    },
    computed: {
        totalValue() {
            return this.product.quantity * this.product.price
        }
    },
    methods: {
        edit() {
            this.$emit('edit')
            alert('Edit broken')
        }
    }
}
</script>
