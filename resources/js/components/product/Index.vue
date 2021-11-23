<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Product</div>

                    <div class="card-body">
                        <router-link :to="{ name: 'product-create' }" class="btn btn-md btn-success">Tambah Product</router-link>

                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Nama Product</th>
                                    <th>Kategori</th>
                                    <th>Saldo</th>
                                    <th>Harga</th>
                                    <th>Biaya Admin</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(product, index) in products" :key="product.id">
                                    <td>{{ product.title }}</td>
                                    <td>{{ product.category.title }}</td>
                                    <td>{{ product.deposit }}</td>
                                    <td>{{ product.price }}</td>
                                    <td>{{ product.category.admin_fee }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'product-edit', params: { id: product.id }}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <button @click.prevent="ProductDelete(product.id, index)" class="btn btn-sm btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

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
                products: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/product`;
            this.axios.get(uri).then(response => {
                this.products = response.data.data;
            });
        },
        methods: {
            ProductDelete(id, index)
            {
                this.axios.delete(`http://localhost:8000/api/product/${id}`)
                    .then(response => {
                        let uri = `http://localhost:8000/api/product`;
                        this.axios.get(uri).then(response => {
                            this.products = response.data.data;
                        });
                    }).catch(error => {
                    alert('system error!');
                });
            }
        }
    }
</script>