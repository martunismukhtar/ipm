<template>
	<div class="col-lg-5 mt-2">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="https://technext.github.io/zay-shop/assets/img/product_single_10.jpg" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <div class="carousel-inner product-links-wap" role="listbox">
                            <div class="carousel-item carousel-item-next carousel-item-start">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="https://technext.github.io/zay-shop/assets/img/product_single_01.jpg" alt="Product Image 1">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="https://technext.github.io/zay-shop/assets/img/product_single_02.jpg" alt="Product Image 2">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="https://technext.github.io/zay-shop/assets/img/product_single_03.jpg" alt="Product Image 3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="https://technext.github.io/zay-shop/assets/img/product_single_04.jpg" alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="https://technext.github.io/zay-shop/assets/img/product_single_05.jpg" alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="https://technext.github.io/zay-shop/assets/img/product_single_06.jpg" alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item active carousel-item-start">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="https://technext.github.io/zay-shop/assets/img/product_single_07.jpg" alt="Product Image 7">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="https://technext.github.io/zay-shop/assets/img/product_single_08.jpg" alt="Product Image 8">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="https://technext.github.io/zay-shop/assets/img/product_single_09.jpg" alt="Product Image 9">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Third slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
</template>

<script>

export default {
	name: "SlidePage",
	
};
</script>

<style scoped>

</style>