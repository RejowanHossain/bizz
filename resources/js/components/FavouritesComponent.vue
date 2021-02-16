<template>
    <div>
        <button v-if="show" @click.prevent='unsave()' class="btn btn-success">Unsave Job</button>
        <button v-else class="btn btn-primary" @click='save()' >Save Job</button>
    </div>
</template>

<script>
    export default {
        props: ['jobid', 'favourited'],
        data(){
            return{
                show: true
            }
        },
        mounted() {
            this.show = this.jobFavorited ? true:false
        },
        computed:{
            jobFavorited(){
                this.favourited
            }
        },
        methods:{
            save(){
                axios.post(/save/+this.jobid)
                .then(response=> this.show=true)
                .catch(error=>alert('Error'))

            },
            unsave(){
                axios.post(/unsave/+this.jobid)
                .then(response=> this.show=false)
                .catch(error=>alert('Error'))

            }
        }
        
    }
</script>
