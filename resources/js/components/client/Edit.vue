<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Client</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="row g-3">
                                    <div class="col">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="First name"
                                            aria-label="First name"
                                            v-model="client.first_name"
                                        />
                                    </div>
                                    <div class="col">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Last name"
                                            aria-label="Last name"
                                            v-model="client.last_name"
                                        />
                                    </div>
                                    <div class="col">
                                        <input
                                            type="date"
                                            class="form-control"
                                            placeholder="DOB"
                                            aria-label="DOB"
                                            v-model="client.dob"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="row g-3">
                                    <div class="col">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Phone"
                                            aria-label="Phone"
                                            v-model="client.phone"
                                        />
                                    </div>
                                    <div class="col">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Email"
                                            aria-label="Email"
                                            v-model="client.email"
                                        />
                                    </div>
                                    <div class="col">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Address"
                                            aria-label="Address"
                                            v-model="client.address"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-auto me-auto">
                                <h5>Payments</h5>
                            </div>
                            <div class="col-auto">
                                <div class="col align-self-end">
                                    <button
                                        type="button"
                                        v-on:click="addPayment"
                                        class="btn btn-primary"
                                    >
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div v-for="payment in payments" :key="payment.id">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="row g-3">
                                        <div class="col">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Transaction ID"
                                                aria-label="Transaction ID"
                                                v-model="payment.transaction"
                                            />
                                        </div>
                                        <div class="col">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Amount"
                                                aria-label="Amount"
                                                v-model="payment.amount"
                                            />
                                        </div>
                                        <div class="col">
                                            <input
                                                type="date"
                                                class="form-control"
                                                placeholder="Date"
                                                aria-label="Date"
                                                v-model="payment.date"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"editar-Client",
    data(){
        return {
            client: {
                first_name: "",
                last_name: "",
                dob: "",
                phone: "",
                email: "",
                address: "",
            },
            payments: [{}],
        }
    },
    mounted(){
        this.showClient()
    },
    methods:{
        addPayment() {
            if (this.payments.length < 5) this.payments.push({});
        },
        async showClient(){
            await this.axios.get(`/api/clients/${this.$route.params.id}`).then(response=>{
                const { first_name, last_name,dob, phone, email, address } = response.data
                this.client.first_name = first_name
                this.client.last_name = last_name
                this.client.dob = dob
                this.client.phone = phone
                this.client.email = email
                this.client.address = address
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            for (let index = 0; index < this.payments.length; index++) {
                        this.payments[index].client_id = this.$route.params.id
                        this.axios
                            .put(`api/payments/${this.route.params.id}`, this.payments[index])
                            .then((response) => {})
                            .catch((error) => {
                                console.log(error);
                            });
                    }
            await this.axios.put(`/api/clients/${this.$route.params.id}`,this.client).then(response=>{

                this.$router.push({name:"showClients"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
