
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeNavLink,
        Link,
    },
    props: {
        temperatures1: Object,
        temperatures2: Object,
        city1:Object,
        city2:Object,

    },

    methods: {

         changeOrder(){
              this.$inertia.get(route("temperature.order"));
         },
        resetOrder(){
              this.$inertia.get(route("temperature.order.reset"));
         },

         
    },
};

</script>


<template>
    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <div class="container mt-4">
            <div class="card bg-dark">
                <h1 class="card-header text-success" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                    <b>Login Temperature</b>
                </h1>
                    <div class="row col-lg-12 mt-3 ml-2 mr-4">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>
                        <div class="col-md-3"><button @click="changeOrder()" type="button" class="btn btn-sm btn-block" style="background-color:pink;">Hottest First</button></div>
                        <div class="col-md-3"><button @click="resetOrder()" type="button" class="btn btn-sm btn-block" style="background-color:purple; color: white;">Reset Order</button></div>
                    </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-primary"><b>{{ city1 }}</b></h3>
                                    <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <div v-if="temperatures1.length == 0" class="text-danger"> Data Not found. </div>
                                            <tr v-for="(temperature, index) in temperatures1" :key="temperature.id">
                                                <th scope="row" style="width:40%;">{{ temperature.created_at }}</th>
                                                <td>{{ temperature.city1_temp_c }} C</td>
                                                <td>{{ temperature.city1_temp_f }} F</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-primary"><b>{{ city2 }}</b></h3>
                                    <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                             <div v-if="temperatures2.length == 0"  class="text-danger"> Data Not found. </div>
                                             <tr v-for="(temperature, index) in temperatures2" :key="temperature.id">
                                                <th scope="row" style="width:40%;">{{ temperature.created_at }}</th>
                                                <td>{{ temperature.city2_temp_c }} C</td>
                                                <td>{{ temperature.city2_temp_f }} F</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jumbotron">
                <h1 class="display-4">Hello, {{ $page.props.auth.user.name }}!</h1>
                <p class="lead">
                    Current
                    temperature of two cities
                </p>
                <hr class="my-4" />
                <p>
                   The task is to implement a small weather webapp.
                </p>
                <a class="btn btn-primary btn-lg" href="#" role="button"
                    >Learn more</a
                >
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
