<template>
    <div>
        <h1>
            Edit Article
        </h1>
        <br>
        <form action="">
            <label for="title">Title</label>
            <input type="text" name="title">
            <br>
            <label for="content">Content</label>
            <input type="text" name="content">
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Article Edit page mounted.')
        }
    }
</script>
