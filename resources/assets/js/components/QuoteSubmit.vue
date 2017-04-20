<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Submit</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/quotes" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="quote" class="col-md-3 control-label">Quote</label>

                                <div class="col-md-6">
                                    <textarea v-model="quote" id="quote" type="text" class="form-control" name="quote" autofocus></textarea>
                                    <span v-if="errors.quote" class="help-block">
                                        <strong v-for="error in errors.quote">{{error}}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="quotee" class="col-md-3 control-label">Quotee</label>

                                <div class="col-md-6">
                                    <input v-model="quotee" id="quotee" type="text" class="form-control" name="quotee" autofocus>
                                    <span v-if="errors.quotee" class="help-block">
                                        <strong v-for="error in errors.quotee">{{error}}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-md-3 control-label">Image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="" v-on:change="file_selected" name="image" autofocus>
                                    <span v-if="errors.image" class="help-block">
                                        <strong v-for="error in errors.image">{{error}}</strong>
                                    </span>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary" v-on:click="submit_quote" >
                                        Submit
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
        mounted() {
        },
        data() {
            return {
                quote: '',
                quotee: '',
                image: null,
                errors: {},
            }
        },
        methods: {
            submit_quote: function (e) {
                e.preventDefault();
                var data = new FormData();
                data.append('quote' , this.quote);
                data.append('quotee', this.quotee);
                data.append('image' , this.image);

                axios.post('api/quotes',data)
                     .then((response) => {
                        console.log(response.data)
                    })
                    .catch((error) => {

//                        console.log(error.response)
//                        if (error.response) {
//                            // The request was made, but the server responded with a status code
//                            // that falls out of the range of 2xx
//                            console.log(error.response.data);
//                            this.errors = error.response.data;
//                            console.log(error.response.status);
//                            console.log(error.response.headers);
//                        } else {
//                            // Something happened in setting up the request that triggered an Error
//                            console.log('Error', error.message);
//                        }
                    });
            },
            file_selected: function(e) {
                this.image = e.target.files[0]
                console.log('file selected' +  e.target.files[0])
            }
        }
    }
</script>