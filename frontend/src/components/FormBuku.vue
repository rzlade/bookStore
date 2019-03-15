<template>
  <div>
    <h2 style="margin-top:50px;">Tambah Buku</h2>
    <form @submit.prevent="submitForm">
      <div>
        <!-- <label>Judul Buku</label> -->
        <input type="text" v-model="buku.judul" placeholder="Judul Buku">
      </div>
      <div>
        <!-- <label>Penulis</label> -->
        <input type="text" v-model="buku.penulis" placeholder="Penulis">
      </div>
      <div>
        <!-- <label>Penerbit</label> -->
        <input type="text" v-model="buku.penerbit" placeholder="Penerbit">
      </div>
      <div>
        <!-- <label>Supplier</label> -->
        <input type="text" v-model="buku.supplier" placeholder="Supplier">
      </div>
      <div>
        <!-- <label>Tahun Terbit</label> -->
        <input type="number" v-model="buku.tahun_terbit" placeholder="Tahun Terbit">
      </div>
      <div>
        <!-- <label>Harga</label> -->
        <input type="number" v-model="buku.harga" placeholder="Harga">
      </div>
      <div>
        <!-- <label>Stok</label> -->
        <input type="number" v-model="buku.stok" placeholder="Stok">
      </div>
      <button type="submit">Simpan</button>
    </form>
  </div>
</template>
<script>
import { api } from '@/helper/api'

export default {
  name: 'FormBuku',
  data() {
    return {
      buku: {
        no_buku: null,
        judul: '',
        penulis: '',
        penerbit: '',
        supplier: '',
        tahun_terbit: '',
        harga: '',
        stok: ''
      }
    }
  },
  mounted(){
      let id = this.$route.params.id

      if(id) {
        api.get('/buku/' + id).then(res => {
          this.buku = res.data.result
        })
      }
  },
  methods: {
    submitForm() {
      let data = this.buku
      let url = 'buku'

      if (this.buku.no_buku) {
        url += '/' + this.buku.no_buku
      }

      api.post(url,data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/buku')
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    }
  }
}
</script>

<style scoped>
  input{
    margin-top : 5px;
    width: 300px;
  }
</style>
