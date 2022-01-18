<template>
    <main>
        <h2>Listado de publicaciones</h2>
         <button class="btn btn-success" v-on:click="cancelar">Volver</button>
         <router-link :to="{name: 'crearDetalle', params: {id: idPadre}}" class="btn btn-info"> Nuevo Post </router-link>
            <!-- {{ `IdPadre: ${idPadre}`}} -->
         <table class="table table-striped">
            <thead>
                <tr>
                 <th scope="col"> Id</th>
                 <th scope="col"> Contenido</th>
                 <th scope="col"> Autor </th>
                 <th scope="col"> Creación </th>
                 <th scope="col"> Ultima Modificación </th>
               </tr>
            </thead>
            <tbody>
               <tr v-for=" dt in Detalleblog.data" :key="dt.id">
                   <td>{{ dt.id }}</td>
                   <td>{{ dt.contenido }}</td>
                   <td>{{ dt.autor }}</td>
                   <td>{{ dt.created_at }}</td>
                   <td>{{ dt.updated_at }}</td>
                   <td>
                     <router-link :to="{name: 'editarBlog', params: {id: dt.id}}" class="btn btn-success"> Edit </router-link>
                     <button @click="borrarPost(dt.id)" class="btn btn-danger">Eliminar</button>
                   </td>
              </tr>
            </tbody>
        </table>
    </main>
</template>


<script>
export default {
name:'DetalleBlog',
data(){
    return{
        Detalleblog:{},
        idPadre:""
    }
},
mounted(){
       this.getDetalle(this.$route.params.id);
       this.idPadre = this.$route.params.id;
       console.log(`${this.$route.params.id}`);
    },
methods:{
      getDetalle(id){
          this.axios.post('http://127.0.0.1:8000/api/alldetalle',{idPadre : id})
          .then( response => {
             this.Detalleblog = response
              console.log(this.Detalleblog);
          }
        )
      },
      borrarPost(id){
           if(confirm('¿Esta usted seguro de realizar esta acción?')){
               this.axios.delete(`http://localhost:8000/api/deleteDetalle/${id}`)
               .then(response => {
                     this.$router.push({name:'blogs'})
                 }).catch(error =>{console.log(error);
             })
           }
        },
      cancelar(){
        this.$router.go(-1)
      }
   }
}
</script>
