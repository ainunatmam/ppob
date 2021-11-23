<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Edit Customer</div>

                    <div class="card-body">

                        <form @submit.prevent="CustomerUpdate()">

                            <div class="form-group">
                                <label>Nama Customer</label>
                                <input type="text" class="form-control" v-model="customer.name"
                                       placeholder="Masukkan Nama Customer">
                                <div v-if="validation.name">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.name }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>No Handphone</label>
                                <input type="text" class="form-control" v-model="customer.phone_number"
                                       placeholder="Masukkan No Handphone">
                                <div v-if="validation.phone_number">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.phone_number }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" v-model="customer.email"
                                       placeholder="Masukkan Email">
                                <div v-if="validation.email">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.email }}
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
                customer: {},
                validation: [],
            }
        },
        created() {
            let uri = `http://localhost:8000/api/customer/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.customer = response.data.data;
                console.log(response.data.data);
            });
        },
        methods: {
            CustomerUpdate() {
                let uri = `http://localhost:8000/api/customer/${this.$route.params.id}`;
                this.axios.put(uri, this.customer)
                    .then((response) => {
                        this.$router.push({
                            name: 'customer-index'
                        });
                    }).catch(error => {
                    this.validation = error.response.data.errors;
                });
            }
        }
    }
</script>