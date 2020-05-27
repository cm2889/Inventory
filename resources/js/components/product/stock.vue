<template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All Product</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row card container">

            <div class="card-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <label>Search</label>
                        <input type="text" v-model="searchTerm" class="form-control" style="width:200px; "><br>
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">

                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Photo</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Available Product</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr v-for="product in filtersearch" :key="product.id">
                                <td>{{ product.product_name}}</td>
                                <td>{{ product.product_code}}</td>
                                <td><img :src="product.image" id="em_photo"></td>
                                <td>{{ product.category_name }}</td>
                                <td v-if="product.product_quantity >= 1"><span class="badge badge-success">Availble</span></td>
                                <td v-else=""><span class="badge badge-danger">Stock Out</span></td>

                                <td>{{ product.product_quantity }}</td>
                                <td>
                                    <router-link :to="{name: 'edit-stock', params:{id: product.id} }" class="btn btn-sm btn-info">Edit</router-link>

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

    export default {
        mounted(){
            if (!User.loggedIn()) {
                this.$router.push({ name:'/' })
            }
        },

        created(){
            this.allProduct();
        },

        data(){
            return{
                products:[],
                searchTerm:'',
            }
        },
        computed:{
            filtersearch(){
                return this.products.filter(product => {
                    return product.product_name.match(this.searchTerm)
                })
            }
        },
        methods:{
            allProduct(){
                axios.get('/api/product/')
                    .then(({data}) => (this.products = data))
                    .catch()
            }

        }

    }



</script>

<style>

    #add_new{
        float: right;
    }
    #em_photo{
        height: 40px;
        width: 40px;
    }

</style>
