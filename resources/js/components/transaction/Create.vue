<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Tambah Order</div>

                    <div class="card-body">

                        <form @submit.prevent="OrderStore()">

                            <div class="form-group">
                                <label>Nama Product</label>
                                <select name="product_id" v-model="order.product_id">
                                    <option v-for="product in products" v-bind:key="product.id" v-bind:value="product.id"> {{ product.title }}</option>
                                </select>
                                <div v-if="validation.title">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.title }}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Customer</label>
                                <select name="category_id" v-model="order.customer_id">
                                    <option v-for="customer in customers" v-bind:key="customer.id" v-bind:value="customer.id"> {{ customer.name }}</option>
                                </select>
                                <div v-if="validation.customer_id">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.customer_id }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <span> {{ products.filter(x => x.id === order.product_id).map(x => x.price+x.category.admin_fee) }} </span>
                            </div>

                            <div class="form-group">
                                <label>No Tujuan</label>
                                <input type="text" class="form-control" v-model="order.tujuan"
                                       placeholder="Masukkan No Tujuan">
                                <div v-if="validation.tujuan">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.tujuan }}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-success">Simpan</button>
                                <button type="reset" class="btn btn-md btn-danger">Reset</button>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                order: {},
                validation: [],
                customers: [],
                products:[],
            }
        },
        created() {
            let uri = `http://localhost:8000/api/product`;
            this.axios.get(uri).then(response => {
                this.products = response.data.data;
            });
            let url = `http://localhost:8000/api/customer`;
            this.axios.get(url).then(response => {
                this.customers = response.data.data;
            });
        },
        methods: {
            OrderStore() {
                let uri = 'http://localhost:8000/api/transaction';
                this.axios.post(uri, this.order)
                    .then((response) => {
                        this.$router.push({
                            name: 'transaction-index'
                        });
                    }).catch(error => {
                    this.validation = error.response.data.errors;
                });
            }
        }
    }
</script>