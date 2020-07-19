<template>
<div>


                           <router-link @click="shows == 0" v-show="shows =  1" to="/CreateEmploye" class="btn btn-primary">إنشاء</router-link>
                          <router-link @click="shows == 0"  v-show="shows = 1 " to="/ShowEmploye" class="btn btn-primary">متابعة</router-link>
                 
            
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