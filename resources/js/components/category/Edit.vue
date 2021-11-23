<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Edit Category</div>

                    <div class="card-body">

                        <form @submit.prevent="CategoryUpdate()">

                            <div class="form-group">
                                <label>Nama Category</label>
                                <input type="text" class="form-control" v-model="category.title"
                                       placeholder="Masukkan Nama Category">
                                <div v-if="validation.title">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.title }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Biaya Admin</label>
                                <input type="text" class="form-control" v-model="category.admin_fee"
                                       placeholder="Masukkan Biaya Admin">
                                <div v-if="validation.admin_fee">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.admin_fee }}
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
                category: {},
                validation: [],
            }
        },
        created() {
            let uri = `http://localhost:8000/api/category/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.category = response.data.data[0];
                console.log(response.data.data[0]);
            });
        },
        methods: {
            CategoryUpdate() {
                let uri = `http://localhost:8000/api/category/${this.$route.params.id}`;
                this.axios.put(uri, this.category)
                    .then((response) => {
                        this.$router.push({
                            name: 'category-index'
                        });
                    }).catch(error => {
                    this.validation = error.response.data.errors;
                });
            }
        }
    }
</script>