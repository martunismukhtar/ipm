<template>
	<div class="container pb-5">
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill">{{this.$store.state.barang.length}}</span>
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
                        <input type="text" class="form-control" v-model="nama"/>    
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Email</label>
                            <input type="email" class="form-control" v-model="email"/>
                    </div>
                    <div class="col-sm-6">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control" v-model="nomor_telepon">
                            
                        </div>
                     <div class="col-sm-6">
                            <label class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" v-model="kode_pos">
                            
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" v-model="alamat">
                            
                        </div>
                       <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
	name: "CheckoutPage",
	data(){
		return {
			nama:'',
            email:'',
            telepon:'',
            kode_pos:'',
            alamat:''
		}
	},
    mounted() {
        console.log(this.$store.state.product)
    },
    methods: {
        bayar(){
            const barang = this.$store.state.barang;
            const {nama, email, telepon, kode_pos, alamat} = this;
            const {weight, dimension} = this.$store.state;
            let qty=[], product=[], price=[];
            
            for(let j=0;j<barang.length;j++) {
                qty.push(barang[j].qty);
                product.push(barang[j].product);
                price.push(barang[j].price);
            }

            let url = this.$store.state.api+'checkout'
            axios.post(url, {
					qty, product, price,
                    nama, email, telepon, kode_pos, alamat,
                    weight, dimension
				},{ headers: "" }).then((res) => {
                    if(res.status===200) {
                        window.location.href = res.data.data.redirect;
                    } else {
                        alert(res.data)
                    }
                    this.$store.commit('resetChart');
                    this.$store.commit('resetDim');
				}).catch((err) => console.log(err));
            
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