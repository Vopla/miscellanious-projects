Vue.component('current-time',{

    props:['text'],

    data:
        function(){
        return{
        currentTime: null,
        range: 0,
    }
    },

    methods: {
        updateCurrentTime(){
            this.currentTime = moment().format('hh:mm:ss')
        }
    },

    created(){
        this.currentTime = moment().format('hh:mm:ss');
        setInterval(() => this.updateCurrentTime(), 1 * 1000);
               
    },

    template:'<li>{{ text }} {{ currentTime }}</li>',

})

let clock = new Vue({el: "#test-2"});


var button = new Vue({
    el: '#left',
    data:{
        range: 0, 
        message: 'Press me!'
        
    },
    methods: {
        addNew: function(){
            this.message = this.range
            this.range += 1
        }
    }

});