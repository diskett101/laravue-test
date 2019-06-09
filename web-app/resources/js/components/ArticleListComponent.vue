<template>
    <div>
        <h1>
            Article List
        </h1>
        <br>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>CONTENT</th>
                    <th></th>
                </tr>
            </thead>
            <tbody v-if="listData.length > 0">
                <tr v-for="article in listData" v-bind:key="article.id">
                    <td>{{ article.id }}</td>
                    <td>{{ article.title }}</td>
                    <td>{{ article.content }}</td>
                    <td>
                        <button type="button" v-on:click="removeArticle(article.id)">X</button>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="4">NO DATA</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Article List page mounted.')
        },
        data() {
            return {
                listData : []
            }
        },
        created() {
            this.getListData();
        },
        methods: {
            getListData() {
                axios({
                    method: 'get',
                    url: '/api/articles'
                }).then(({data}) => {
                    this.listData = data.data;
                    console.log('data', data.data);
                    console.log('this.listData', this.listData);
                });
            },
            removeArticle(id) {
                if (confirm("Remove?")) {
                    axios({
                        method: 'delete',
                        url: '/api/articles/' + id
                    }).then(({data}) => {
                        this.getListData();
                    })
                }
            }
        }
    }
</script>
