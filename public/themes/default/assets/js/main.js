Vue.component('tasks', {
    template: '#tasks-template',
    data: function(){
        return {
            list: []
        };
    },
    created: function(){
        this.fetchTaskList();
    }, 
    methods: {
        fetchTaskList: function(){
            this.$http.get('api/tasks', function(tasks){
                this.list = tasks;
            }.bind(this));
            // $.getJSON('api/tasks', function(tasks){
            //     this.list = tasks;
            // }.bind(this));
        },
        deleteTask: function(task){
            this.list.$remove(task);
        }
    }
})


new Vue({
    el: '#app'  
})