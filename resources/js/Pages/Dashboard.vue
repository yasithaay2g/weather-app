
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
        temperatures: Object,

    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("temperatures.destroy", id));
        },

         changeOrder(){
              this.$inertia.get(route("temperature.order"));
         },

         
         
    },
};


</script>


<template>
    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <div class="container mt-4">
            <div class="card">
                <h2 class="card-header text-success">
                    <b>Login Temperature</b>
                </h2>
                    <div class="row col-lg-12 mt-3 ml-2 mr-4">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-md-3"><button  @click="changeOrder()" type="button" class="btn btn-sm btn-block" style="background-color:pink;">Hottest First</button></div>
                                    <div class="col-md-3"><button type="button" class="btn btn-sm btn-block" style="background-color:purple; color: white;">Reset Order</button></div>
                    </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Colombo</b></h5>
                                    <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr v-for="(temperature, index) in temperatures" :key="temperature.id">
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
                                    <h5 class="card-title"><b>Melbourne</b></h5>
                                    <div class="table-responsive">

                                    <table class="table">
                                        <tbody>
                                             <tr v-for="(temperature, index) in temperatures" :key="temperature.id">
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
                <h1 class="display-4">Hello, world!</h1>
                <p class="lead">
                    This is a simple hero unit, a simple jumbotron-style
                    component for calling extra attention to featured content or
                    information.
                </p>
                <hr class="my-4" />
                <p>
                    It uses utility classes for typography and spacing to space
                    content out within the larger container.
                </p>
                <a class="btn btn-primary btn-lg" href="#" role="button"
                    >Learn more</a
                >
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
