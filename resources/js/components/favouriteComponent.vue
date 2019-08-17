<template>
    <div id="app">



        <button v-if="show" @click.prevent="unsave()"  class="btn btn-primary btn-sm">Un-Save</button>
        <button v-else @click.prevent="save()"  class="btn btn-dark btn-sm">Save</button>





    </div>
</template>

<script>
    export default {
        props:['jobid','favorited'],

        data(){
            return {
                'show':true
            }
        },
        mounted() {
            this.show = this.JobFavorited ? true :false;

        },
        computed:{
            JobFavorited(){
                return this.favorited;
            }
        },
        methods:{
            save(){
                axios.post('/save/'+this.jobid).then(response=>
                    this.show=true).catch(error=>
                    alert('This is Error Here'));
            },
            unsave(){

                axios.post('/unsave/'+this.jobid).then(response=>this.show=false).catch(error=>alert('This is Error Here'));


            }

        }

    }
</script>
