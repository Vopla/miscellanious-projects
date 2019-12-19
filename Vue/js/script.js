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

let clock = new Vue({
    
    el: "#test-2",
    data:{
        range: 1,
    }
});


var button = new Vue({
    el: '#left',
    data:{
        range: 0, 
        message: 'Add more clocks!'
        
    },
    methods: {
        addNew: function(){
            this.range += 1
            clock.range += 1         
        }
    }

});

var removeAClock = new Vue({
    el: '#right',
    data:{
        message: 'Remove the last clock',
        
    },

    methods: {
        removeClock: function(){
            try{
                if(clock.range === 0){
                    throw "There are no clocks left";
                    
                }
                else{
                    clock.range -= 1
                }
            }
            catch(err){
                console.log("No clocks left!")
            }
        }
    }
})