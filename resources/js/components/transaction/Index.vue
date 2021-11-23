<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">List Transaction</div>

                    <div class="card-body">
                        <router-link :to="{ name: 'transaction-create' }" class="btn btn-md btn-success">Tambah Order</router-link>

                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Nama Produk</th>
                                    <th>Nama Customer</th>
                                    <th>No Tujuan</th>
                                    <th>Sisa Saldo</th>
                                    <th>Jumlah</th>
                                    <th>Pajak</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(order, index) in orders" :key="order.id">
                                    <td>{{ order.invoice }}</td>
                                    <td>{{ order.product.title }}</td>
                                    <td>{{ order.customer.name }}</td>
                                    <td>{{ order.tujuan }}</td>
                                    <td>{{ order.deposit_left }}</td>
                                    <td>{{ order.amount }}</td>
                                    <td>{{ order.tax }}</td>
                                    <td>{{ order.total }}</td>
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
                orders: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/transaction`;
            this.axios.get(uri).then(response => {
                this.orders = response.data.data;
            });
        },
    }
</script>