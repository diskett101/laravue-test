<template>
    <div>
        <h1>
            Create Article
        </h1>
        <br>
        <form method="post" @submit.prevent="onSubmit">
            <label for="title">Title</label>
            <input type="text" name="title" v-model="articleData.title">
            <span v-if="errors.title">{{ errors.title[0] }}</span>
            <br>
            <label for="content">Content</label>
            <input type="text" name="content" v-model="articleData.content">
            <span v-if="errors.content">{{ errors.content[0] }}</span>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Article Create page mounted.')
        },
        data() {
            return {
                errors: {},
                articleData: {}
            };
        },
        methods: {
            onSubmit() {
                axios({
                    method: 'post',
                    url: '/api/articles',
                    data: this.articleData
                }).then(({response})=>{
                    window.location.href = '/';
                }).catch(({response}) => {
                    this.errors = response.data.error
                })
            }
        }
    }
</script>
