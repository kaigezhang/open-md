Vue.component('tasks', {
    template: '#tasks-template',
    data: function(){
        return {
            list : []
        };
    },

    created: function(){
        this.fetchTaskList();
    },
    methods: {
        fetchTaskList: function(){
            this.$http.get('api/tasks', function(task){
                this.list = task.body;
            }.bind(this))
        }
    }

})

new Vue({
    el: '#app'
})

