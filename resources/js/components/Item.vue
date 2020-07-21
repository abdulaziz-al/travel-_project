<template>
<div>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                           <router-link @click="shows == 0" v-show="shows =  1" to="/CreateEmploye" class="btn btn-primary" id="test">إنشاء</router-link>
                          <router-link @click="shows == 0"  v-show="shows = 1 " to="/ShowEmploye" class="btn btn-primary" id="test">متابعة</router-link>
                 
            
                    </div>


                 
                        
                    </div>
                    </div>
                    </div>

    </div>
    
                    </div>
</template>

<script>
import show from './ShowEmploye'
import create from './CreateEmploye'
export default {
    data(){
        return{
        shows:0,
        create:0,
        }
    },
    components:{
        show ,
        create
    }
}
</script>
<style>
#test{
    margin-left: 30%;
}

</style>