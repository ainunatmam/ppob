<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Product</div>

                    <div class="card-body">
                        <router-link :to="{ name: 'category-create' }" class="btn btn-md btn-success">Tambah Category</router-link>

                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Nama Kategory</th>
                                    <th>Biaya Admin</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(category, index) in categories" :key="category.id">
                                    <td>{{ category.title }}</td>
                                    <td>{{ category.admin_fee }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'category-edit', params: { id: category.id }}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <button @click.prevent="CategoryDelete(category.id, index)" class="btn btn-sm btn-danger">Hapus</button>
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
                categories: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/category`;
            this.axios.get(uri).then(response => {
                this.categories = response.data.data;
            });
        },
        methods: {
            CategoryDelete(id, index)
            {
                this.axios.delete(`http://localhost:8000/api/category/${id}`)
                    .then(response => {
                        let uri = `http://localhost:8000/api/category`;
                        this.axios.get(uri).then(response => {
                            this.categories = response.data.data;
                        });
                    }).catch(error => {
                    alert('system error!');
                });
            }
        }
    }
</script>