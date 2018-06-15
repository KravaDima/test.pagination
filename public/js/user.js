let app2 = new Vue({
    el: "#app2",
    data: {
        users: [],
        pagination: null
    },
    methods:{
        getUser(page){
            $that = this;
            axios({
                method: 'get',
                // url: '/user?page=' + page,
                url: '/user',
                params: {
                    page: page
                },
            }).then(function (response) {
                $that.users = response.data.data;
                $that.pagination = response.data.meta.pagination;
            }).catch(error => alert(error));
        },
    },
    mounted(){
        this.getUser(1);
    }
});