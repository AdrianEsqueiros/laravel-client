<template>
    <div class="row mb-2">
        <div class="col-auto me-auto"><h4>Clients</h4></div>
        <div class="col-auto">
            <div class="col align-self-end">
                <router-link
                    :to="{ name: 'createClients' }"
                    class="btn btn-success"
                    ><i class="fa-solid fa-plus"></i> Add Client</router-link
                >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Client Name</th>
                            <th>DOB</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Payments</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="client in clients" :key="client.id">

                            <td>
                                {{ client.first_name }} {{ client.last_name }}
                            </td>
                            <td>{{ client.dob }}</td>
                            <td>{{ client.phone }}</td>
                            <td>{{ client.email }}</td>
                            <td>{{ client.address }}</td>
                                                        <!-- <tr v-for="payment in payments" :key="payment.client_id">

                                <td>{{ payment.id }}</td>
                                <td>{{ client.id }}</td> -->

                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link
                                    :to="{
                                        name: 'editClient',
                                        params: { id: client.id },
                                    }"
                                    class="btn btn-info mx-1"
                                    ><i class="fas fa-edit"></i
                                ></router-link>
                                <a
                                    type="button"
                                    @click="deleteclient(client.id)"
                                    class="btn btn-danger mx-1"
                                    ><i class="fas fa-trash"></i
                                ></a>
                            </td>
                            <!-- </tr> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "clients",
    data() {
        return {
            clients: [],
            payments: [],
            total: 0,
            count: [],
        };
    },
    mounted() {
        this.showclients();
    },
    methods: {
        async showclients() {
            await this.axios
                .get("/api/clients")
                .then((response) => {
                    this.clients = response.data;
                    this.axios.get("/api/payments").then((res) => {
                        // for (let index = 0;index < this.payments.length;index++) {
                        //         if(this.payments[index].client_id == this.clients[2].id )
                        //         this.total +=1
                        //         this.count.push(this.total)
                        //         console.log(this.count);

                            this.payments = res.data;

                            // this.total = this.payments[index].client_id
                            // console.log(this.payments[index].client_id);
                        // }
                    });
                })
                .catch((error) => {
                    this.client = [];
                });
        },
        deleteclient(id) {
            if (confirm("Are you sure you want to delete this client?")) {
                this.axios
                    .delete("/api/clients/" + id)
                    .then((response) => {
                        this.showclients();
                    })
                    .catch((error) => {
                        console.error(error.message);
                    });
            }
        },
    },
};
</script>

<style></style>
