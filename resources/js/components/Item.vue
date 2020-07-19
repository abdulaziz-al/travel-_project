<template>
<div>


     <div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <input type="submit" class="btn btn-primary" id="menu1" @click="show = 0 , create = 1" value="إنشاء" />
    <input type="submit"  class="btn btn-primary" id="menu2" @click="show = 1 , create = 0" value="متابعة"/>
                    </div>

                <div class="card-body">
             
                    <show v-show="show == 1" ></show>
                    <create v-show="create == 1" ></create>
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
        show:0,
        create:0
        }
    },
    components:{
        show ,
        create
    }
}
</script>