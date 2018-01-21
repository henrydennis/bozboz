var vm = new Vue({
    el: '#app',

    data: {
      posts: null,
      comments: null
    },

    created: function () {
        this.fetchPosts();
    },
    
    methods: {
        fetchPosts: function () {
            var self = this;
            $.get("https://jsonplaceholder.typicode.com/posts", function( posts ) {
                self.posts = posts;
                

                self.posts.forEach ( function (post) {
                    post.comments = [];
                    post.show_comments = false;
                    $.get("https://jsonplaceholder.typicode.com/posts/"+post.id+"/comments", function( comments ) {
                        post.comments = comments;
                                            
                    }).done( function () {
                        self.$forceUpdate();
                        
                    });

                });

                
                
            }).done( function () {

                console.log(self.posts);
                
            });

        },
        fetchComments: function () {
            var self = this;

            $.get("https://jsonplaceholder.typicode.com/posts/"+post.id+"/comments", function( comments ) {
                self.comments = comments;

            });

        }
    }

});