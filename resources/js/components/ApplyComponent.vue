<template>
    <div id="app">

        <form @submit="formSubmit(e)">


                <button v-if="show"  class="btn btn-success btn-sm">Apply</button>

                <div v-else class="alert alert-success">
                    Application Sent Successfuly
                </div>

        </form>

    </div>
</template>

<script>
    export default {
        props:["jobid"],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                'show':true
            }
        },
        methods:{

            forSubmit(e){



            }

        }
    }
</script>
