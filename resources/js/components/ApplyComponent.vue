<template>
    <div>
        <form @submit='formSubmit'>
            <button v-if="show" class="btn btn-primary">Apply</button>
            <div class="alert alert-success" v-else>
                Job apllied successfully
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['jobid'],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                show: true
            }
        },
        methods:{
            formSubmit(e){
                e.preventDefault();
                axios.post(/applications/+this.jobid,{

                }).then((response)=>{
                    this.show=false
                })
            }
        }
    }
</script>
