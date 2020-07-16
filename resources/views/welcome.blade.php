<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <style>
        form { width: 100%; }
        </style>
    </head>
    <body>
        <div id="app" class="container">
            <h1 class="mt-5">Simple Bulletin Board</h1>
            <div class="row text-right">
                <button class="btn btn-primary mt-3 mb-3">Create New Article</button>
            </div>
            <div class="row">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" v-model="title" aria-describedby="title" placeholder="Enter article title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control"  v-model="content"  id="content" rows="3"></textarea>
                    </div>
                    <button type="button" @click="addArticle()" class="btn btn-primary">Post</button>
                </form>
            </div>

            <div class="row mt-5"> 
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="article in articles" :key="article.id">
                            <td>@{{ article.title }}</td>
                            <td>@{{ article.content }}</td>
                            <td>@{{ article.created_at }}</td>
                            <td>
                                <a href="" class="btn btn-info">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            new Vue({
                el: '#app',
                data: {
                    articles: [],
                    title: '',
                    content: ''
                },
                async created() {
                    await this.getArticles();
                },
                methods: {
                    addArticle() {
                        let data = {
                            title: this.title,
                            content: this.content
                        }
                        axios.post('/api/articles', data)
                            .then(function (response) {
                                console.log('added', response);
                            })
                    },
                    getArticles() {
                        let self = this
                        axios.get('/api/articles')
                            .then(function (response) {
                                response.data.forEach(function(item) {
                                    self.articles.push(item)
                                })
                                console.log(this.articles)
                            })
                            
                    }
                }
            })
        </script>
    </body>
</html>
