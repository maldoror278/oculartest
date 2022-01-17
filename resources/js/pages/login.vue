<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>

                <div class="card card-default">

                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form @submit.prevent="login">

                            <div class="form-group row mb-3">
                                <label for="usuario" class="col-sm-4 col-form-label text-md-right">Usuario</label>
                                <div class="col-md-6">
                                    <input id="usuario" type="text" class="form-control" v-model="usuario">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="password">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
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
export default {
    data() {
        return {
            usuario: "",
            password: "",
            error: null
        }
    },
    methods: {
        login(){
            this.axios.post('http://localhost:8000/api/login', {
                usuario: this.usuario,
                password: this.password
            })
              .then( (res) => {
                  console.log(res);
                 if(res.data.success){
                   this.$router.push({name:'admin'})
                 }else{
                     this.error = res.data.message
                 }
            }).catch(function (error) {
                console.error(error);
            })


        }
    }

}
</script>
