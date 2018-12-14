<template>
    <div>
        <product-form @created="store" @updated="update" :product="product"></product-form>
        <product-list class="mt-4" :products="products" @edit="edit"></product-list>
    </div>
</template>
<script>
export default {
    props: ['prods'],
    data() {
        return {
            product: null,
            products: this.prods
        }
    },
    methods: {
        store(product) {
            this.products.push(product)
        },
        update(product) {
            this.products = this.products.map(p => {
                if (p.id == product.id) {
                    return product
                }
                return p
            })
        },
        edit(product) {
            this.product = product
        }
    }
}
</script>
