<template>
  <div>
    <h1 style="margin-top:40px;font-family:'Montserrat'">Data Buku Di Store BukuCuy!</h1>
    <b-button href="/add" variant="success" style="margin-right:900px; margin-top:20px">Tambah Data</b-button>
    <table border="1" style="margin-top:5px;margin-left:170px;">
        <tr>
          <th>No Buku</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Penerbit</th>
          <th>Supplier</th>
          <th>Tahun Terbit</th>
          <th>Harga</th>
          <th>Stok</th>
          <td>Keterangan</td>
          <th>Aksi</th>
        </tr>
        <tr v-for="(buku,i) in data_buku" :key="i">
          <td>{{ buku.no_buku }}</td>
          <td>{{ buku.judul }}</td>
          <td>{{ buku.penulis }}</td>
          <td>{{ buku.penerbit }}</td>
          <td>{{ buku.supplier }}</td>
          <td>{{ buku.tahun_terbit }}</td>
          <td>{{ buku.harga }}</td>
          <td>{{ buku.stok }}</td>
          <td>
            <div v-if="buku.stok != 0">
              <b-badge variant="success" style="font-size:10px;">Tersedia</b-badge>
            </div>
            <div v-else>
              <b-badge variant="danger" style="font-size:10px;">Habis</b-badge>
            </div>
          </td>
          <td>
            <router-link :to="'/buku/'+ buku.no_buku">Edit</router-link> | 
            <button @click="deleteData(buku.no_buku)">Delete</button>
          </td>
        </tr>
    </table>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: "Buku",
  data () {
    return {
      data_buku: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      api.get('buku').then(res => {
        if (res.data.status === 'success') {
          this.data_buku = res.data.result
        }else{
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteData(no_buku){
        api.delete('buku/'+ no_buku).then(res => {
            if (res.data.status === 'success') {
                this.get()
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