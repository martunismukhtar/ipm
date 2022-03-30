<template>
	<div class="container pb-5">
        <div class="row">
            <SlidePage />
            
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">Active Wear</h1>
                        <p class="h3 py-2">Rp10.000</p>
                        <p class="py-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Brand:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>Easy Wear</strong></p>
                            </li>
                        </ul>
                        <h6>Description:</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Color :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>White / Black</strong></p>
                            </li>
                        </ul>
                        <h6>Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                <li>Lorem ipsum dolor sit</li>
                                <li>Amet, consectetur</li>
                                <li>Adipiscing elit,set</li>
                                <li>Duis aute irure</li>
                                <li>Ut enim ad minim</li>
                                <li>Dolore magna aliqua</li>
                                <li>Excepteur sint</li>
                            </ul>
                            <form @submit.prevent="checkout">
                                <div class="row g-3">
                                    <div class="mb-3 row">
										<label class="col-sm-2 col-form-label">Weight</label>
										<div class="col-sm-2">
											<input type="number" class="form-control" v-model="weight">&nbsp;Kg
										</div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Dimension</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" v-model="dimension">&nbsp;PxLxT
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="product-quanity" v-model="qty">
                                            </li>
                                            <li class="list-inline-item">
												<span class="btn btn-success" id="btn-minus"
												@click="(e)=> {
													if(this.qty>=1) {
														this.qty -=1
													}
													
													}">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">{{qty}}</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus" 
												@click="(e)=>this.qty +=1">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <!-- <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                    </div> -->
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
	
</template>

<script>
import SlidePage from './SlidePage.vue';
export default {
	name: "DetailPage",
    components:{
        SlidePage
    },
	data(){
		return {
			qty:1,
            weight:0,
            dimension:0
		}
	},
    methods: {
        checkout(){

            this.$store.commit('addToChart', {
                qty:this.qty,
                product:'baju',
                price:10000,
                description:'--'
            });            
            this.$router.push('/checkout') 
        }
    },
};
</script>

<style scoped>

</style>