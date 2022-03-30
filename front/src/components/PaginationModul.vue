<template>
	<nav aria-label="..." class="text-end">
		<ul class="pagination justify-content-end">
			<li class="page-item" 
					:class="[!column.url ? 'disabled' :
					column.label == curr_page ? 'active' :''
					]" 
					v-for="(column, k) in links" v-bind:key="k">
					<a class="page-link" href="#" @click="paginate(column.url)">
						<span>{{
							clearAmp(column.label)==='Previous'? 
								'&laquo; Previous': clearAmp(column.label)==='Next'
								? 'Next &raquo;':column.label
							}}</span>
					</a>
			</li>
		</ul>
	</nav>
</template>

<script>

export default {
	name: "PaginationModul",
    props:{
        links:Array,
		paginate:Function,
		curr_page:Number
    },
	
	data() {
		return {
			pekerjaan:this.$store.state.filter.pekerjaan,
            tahun:this.$store.state.filter.tahun,
            bulan:this.$store.state.filter.bulan
		}
	},
	methods:{
		filterData(){
			this.cariData();
		
		},
		clearAmp(text){
			if(text==='&laquo; Previous') {
				return 'Previous';
			} 
			if(text==='Next &raquo;') {
				return 'Next';
			}
			return text;
		}
		
	},
	
};
</script>

<style scoped>

</style>