<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="name">Product name</label>
            <input class="form-control" type="text" id="name" name="name" autofocus required v-model="name">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity in stock</label>
            <input class="form-control" type="number" min="0" id="quantity" name="quantity" required v-model="quantity">
        </div>
        <div class="form-group">
            <label for="price">Price per item</label>
            <input class="form-control" type="number" min="0" id="price" name="price" required v-model="price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>
<script>
export default {
    props: ['product'],
    data() {
        return {
            id: null,
            name: null,
            quantity: null,
            price: null
        }
    },
    watch: {
        product(newVal, oldVal) {
            if (! newVal) {
                this.name = null
                this.quantity = null
                this.price = null
            }

            this.id = newVal.id
            this.name = newVal.name
            this.quantity = newVal.quantity
            this.price = newVal.price
        }
    },
    methods: {
        submit() {
            if (this.id) {
                this.update(this.id, {
                    name: this.name,
                    quantity: this.quantity,
                    price: this.price
                })
            } else {
                this.create({
                    name: this.name,
                    quantity: this.quantity,
                    price: this.price
                })
            }
        },
        create(product) {
            axios.post('/products', product)
                .then(({data}) => {
                    this.$emit('created', data)
                    this.reset()
                })
                .catch(error => {
                    console.log(error)
                })
        },
        update(id, product) {
            axios.put(`/products/${id}`, product)
                .then(({data}) => {
                    this.$emit('updated', data)
                    this.reset()
                })
                .catch(error => {
                    console.log(error)
                })
        },
        reset() {
            this.$el.reset()
            this.$el.querySelector('[autofocus]').focus()
        }
    }
}
</script>
