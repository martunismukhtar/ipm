<template>
	<div class="container pb-5">
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill">{{this.$store.state.qty.length}}</span>
                </h4>
                <ul class="list-group mb-3">

                    <li v-for="(prod, index) in this.$store.state.barang" :key="index" class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{prod.product}}</h6>
                            <small class="text-muted">{{prod.description}}</small>
                        </div>
                        <span class="text-muted">{{prod.price*prod.qty}}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (IDR)</span>
                        <strong>{{total}}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Alamat Tagihan</h4>
                <form class="needs-validation" @submit.prevent="bayar">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nama Pembeli</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Email</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="email" class="form-label">Nomor Telepon <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="email" class="form-label">Kode Pos <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

export default {
	name: "CheckoutPage",
	data(){
		return {
			qty:1
		}
	},
    mounted() {
        console.log(this.$store.state.product)
    },
    methods: {
        bayar(){
            console.log(this.$store.state.qty)
            this.$store.commit('resetChart');
        }
    },
    computed: {
        total:function(){
            let t=0;

            for(let i=0;i<this.$store.state.barang.length;i++) {
                t=t+this.$store.state.barang[i].qty*this.$store.state.barang[i].price;
            }
            return t;
        }
    }
};
</script>

<style scoped>

</style>