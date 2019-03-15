<template>
  <div>
    <table border="1">
        <tr>
          <th>ID</th>
          <th>Nama Supplier</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>No Telepon</th>
          <th>Aksi</th>
        </tr>
        <tr v-for="(supplier,i) in data_supplier" :key="i">
          <td>{{ supplier.id }}</td>
          <td>{{ supplier.nama_supplier }}</td>
          <td>{{ supplier.alamat }}</td>
          <td>{{ supplier.email }}</td>
          <td>{{ supplier.no_telepon}}</td>
          <td>
            <router-link :to="'/supplier/'+ supplier.id">Edit</router-link>
          </td>
        </tr>
    </table>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: "Supplier",
  data () {
    return {
      data_supplier: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      api.get('supplier').then(res => {
        if (res.data.status === 'success') {
          this.data_supplier = res.data.result
        }else{
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    }
  }
}
</script>