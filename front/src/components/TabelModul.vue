<template>
	<div class="table-responsive">
		<table class="table">
			<thead class="table-light">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nama</th>
					<th scope="col">Pekerjaan</th>
					<th scope="col">Tanggal Lahir</th>
					<th scope="col">Jenis Tanggal</th>
					<th scope="col">Jenis Minggu</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(column, k) in data_profile" v-bind:key="k">
                    <td >{{column.id}}</td>
                    <td>{{column.nama}}</td>
                    <td>{{column.pekerjaan}}</td>
					<td>{{column.tanggal_lahir}}</td>
					<td>{{column.jenis}}</td>
					<td>{{column.week}}</td>
					<td>
						<button type="button" class="btn btn-sm btn-danger m-1" @click="hapus(column.id)">Hapus</button>
						<button type="button" class="btn btn-sm btn-warning" @click="update(column.id)">Update</button>
						</td>
                </tr>
			</tbody>
		</table>
	</div>
</template>

<script>

export default {
	name: "TabelModul",
    props:{
        data_profile:Array,
		hapus:Function,
		update:Function
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
	},
};
</script>

<style scoped>

</style>