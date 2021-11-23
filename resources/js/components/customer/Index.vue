<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Customer</div>

                    <div class="card-body">
                        <router-link :to="{ name: 'customer-create' }" class="btn btn-md btn-success">Tambah Customer</router-link>

                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Nama Customer</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(customer, index) in customers" :key="customer.id">
                                    <td>{{ customer.name }}</td>
                                    <td>{{ customer.phone_number }}</td>
                                    <td>{{ customer.email }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'customer-edit', params: { id: customer.id }}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <button @click.prevent="CustomerDelete(customer.id, index)" class="btn btn-sm btn-danger">Hapus</button>
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
                customers: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/customer`;
            this.axios.get(uri).then(response => {
                this.customers = response.data.data;
            });
        },
        methods: {
            CustomerDelete(id, index)
            {
                this.axios.delete(`http://localhost:8000/api/customer/${id}`)
                    .then(response => {
                        let uri = `http://localhost:8000/api/customer`;
                        this.axios.get(uri).then(response => {
                            this.customers = response.data.data;
                        });
                    }).catch(error => {
                    alert('system error!');
                });
            }
        }
    }
</script>