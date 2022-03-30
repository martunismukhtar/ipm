<template>
	<div>
	<div class="row">
		<div class="col-auto">
		<button type="button" class="btn btn-primary mb-3" 
			@click="addProfile">
			<i class="fas fa-plus fa-fw"></i> Tambah Data</button>
		</div>
	</div>
	<div class="row ">
        <div class="col-auto">
			<input type="text" class="form-control" v-model="cari" placeholder="Cari">
		</div>
		<div class="col-auto">
			<select class="form-select" v-model="pekerjaan">
				<option :value=0 selected>Pekerjaan</option>
				<option v-for="pekerjaan in daftar_pekerjaan" 
						:value="pekerjaan.pekerjaan" :key="pekerjaan.pekerjaan">
						{{ pekerjaan.pekerjaan }}</option>
			</select>
		</div>
		<div class="col-auto">
			<select class="form-select"  v-model="tahun">
				<option :value="0" selected>Tahun Lahir</option>
				<option v-for="tahun in daftar_tahun" 
					:value="tahun.tahun" :key="tahun.tahun">
					{{ tahun.tahun }}</option>
			</select>
		</div>
		<div class="col-auto">
			<select class="form-select" v-model="bulan">
				<option :value="0" selected>Bulan Lahir</option>
				<option v-for="bulan in daftar_bulan" 
					:value="bulan.bulan" :key="bulan.bulan">
						{{ bulan.bulan }}</option>
			</select>
		</div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary mb-3" @click="filterData">Filter</button>
        </div>
        <!-- <div class="col-auto float-end">
            <button type="button" class="btn btn-primary mb-3 float-end" @click="addProfile">Tambah Data</button>
        </div> -->
    </div>
	</div>
</template>

<script>

export default {
	name: "FilterModul",
    props:{
        get:Function,
        addProfile:Function,
        daftar_pekerjaan:Array,
        daftar_tahun:Array,
        daftar_bulan:Array
    },
	
	data() {
		return {
			pekerjaan:this.$store.state.filter.pekerjaan,
            tahun:this.$store.state.filter.tahun,
            bulan:this.$store.state.filter.bulan,
			cari:this.$store.state.filter.cari
		}
	},
	methods:{
		filterData(){
			this.$store.commit('setFilter', {
				pekerjaan:this.pekerjaan,
				tahun:this.tahun,
				bulan:this.bulan,
				cari:this.cari
			});
			// console.log(this.cari)
			console.log(this.$store.state.filter)
			this.get();
		
		},
		
		
	},
	
};
</script>

<style scoped>

</style>