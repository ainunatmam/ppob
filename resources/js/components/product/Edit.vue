<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Edit Product</div>

                    <div class="card-body">

                        <form @submit.prevent="ProductUpdate()">

                            <div class="form-group">
                                <label>Nama Product</label>
                                <input type="text" class="form-control" v-model="product.title"
                                       placeholder="Masukkan Nama Product">
                                <div v-if="validation.title">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.title }}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="category_id" v-model="product.category_id">
                                    <option v-for="category in categories" v-bind:key="category.id" v-bind:value="category.id"> {{ category.title }} - {{ category.admin_fee }} </option>
                                </select>
                                <div v-if="validation.category_id">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.category_id }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Saldo</label>
                                <input type="text" class="form-control" v-model="product.deposit"
                                       placeholder="Masukkan Nama Product">
                                <div v-if="validation.deposit">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.deposit }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Harga Product</label>
                                <input type="text" class="form-control" v-model="product.price"
                                       placeholder="Masukkan Nama Product">
                                <div v-if="validation.price">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.price }}
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
                product: {},
                validation: [],
                categories: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/product/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.product = response.data.data[0];
                console.log(response.data.data[0]);
            });
            let url = `http://localhost:8000/api/category`;
            this.axios.get(url  ).then(response => {
                this.categories = response.data.data;
            });
        },
        methods: {
            ProductUpdate() {
                let uri = `http://localhost:8000/api/product/${this.$route.params.id}`;
                this.axios.put(uri, this.product)
                    .then((response) => {
                        this.$router.push({
                            name: 'product-index'
                        });
                    }).catch(error => {
                    this.validation = error.response.data.errors;
                });
            }
        }
    }
</script>