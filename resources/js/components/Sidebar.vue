<template>
  <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Simple PPOB
                    </a>
                </li>
                <li>
                    <router-link :to="{ name: 'category-index' }" class="a">Category</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'product-index' }" class="a">Product</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'customer-index' }" class="a">Customer</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'transaction-index' }" class="a">Order</router-link>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
</template>

<script>
  export default{

  }
</script>