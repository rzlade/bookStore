<template>
  <div>
    <form @submit.prevent="submitSupplier">
      <div>
        <label>Nama Supplier</label>
        <input type="text" v-model="supplier.nama_supplier">
      </div>
      <div>
        <label>Nama Supplier</label>
        <input type="text" v-model="supplier.nama_supplier">
      </div>
    </form>
  </div>
</template>
<script>
export default {
    
}
</script>