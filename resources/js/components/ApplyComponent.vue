<template>

    <div>

        <form @submit="formSubmit">


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
        methods: {

            formSubmit(e) {

                e.preventDefault();

                axios.post('/application/' + this.jobid, {}).then((response) => {
                    this.show = false;
                }).catch((error)=> alert('This is Alert Thing'));

            }
        }
    }
</script>
