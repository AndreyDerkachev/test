<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h5 class="card-header">Теги <b style="color: green;">входящие</b> в сортировку</h5>
                <div class="card">
                    <div class="card-body">
                    <select class="custom-select" size="6" v-model="tagsIn" multiple>
                        <option v-for="tag in tags" v-bind:value="tag.id">
                            {{tag.name}}
                        </option>
                    </select>
                    </div>
                </div>

                <h5 class="card-header">Теги <b style="color: red;">не входящие</b> в сортировку</h5>
                <div class="card">
                    <div class="card-body">
                    <select class="custom-select" size="6" v-model="tagsOut" multiple>
                        <option v-for="tag in tags" v-bind:value="tag.id">
                            {{tag.name}}
                        </option>
                    </select>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary mt-2" v-on:click="csvDataRequest">Получить файл</button>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: {
            tags: Array,
            url: String
        },
        data: function () {
            return {
                tagsIn: [],
                tagsOut: [],
            }
        },
        mounted() {

        },
        methods: {
            csvDataRequest: function () {
                var fd = new FormData();
                fd.append('tagsIn',JSON.stringify(this.tagsIn));
                fd.append('tagsOut',JSON.stringify(this.tagsOut));
                axios.post(this.url, fd)
                    .then((response) => {
                        window.location.href = response.data.url;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
        }

    }
</script>
