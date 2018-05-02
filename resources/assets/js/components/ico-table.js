Vue.component('ico-table', {

    props: ['user'],
    mounted() { this.getNotifications() },
    data()
    {
    	return {
    		title: "Add ICO Notification",
    		notes:  null,
            preico: null,
            symbol: null,
            source: null,
            useremail: this.user.email,
            currentSymbol: null,
            userSymbols: []
    	}
    },
    methods: 
    {
        getNotifications()
        {
            axios({
                method: "POST",
                url: "/notify",
                data: { email: this.useremail }
            }).then((response)=>{ 
                this.userSymbols = response.data 
            });
        },
    	addNotification()
        {
    		axios({
    			method: "POST",
    			url: "/notify/store",
    			data: { email: this.useremail, symbol: this.symbol, preico: this.preico, source: this.source, notes: this.notes, notify: this.notify }
    		}).then((response)=>{ 
                this.getNotifications();
                this.resetForm();
            });
    	},
        updateNotification($symbol, $notify)
        {            
            axios({
                method: "POST",
                url: "/notify/update",
                data: { email: this.useremail, symbol: $symbol}
            }).then((response)=>{ 
                this.getNotifications();
            });
        },
        deleteNotification(symbol)
        {
            this.currentSymbol = symbol;
            axios({
                method: "POST",
                url: "/notify/delete",
                data: { email: this.useremail, symbol: this.currentSymbol }
            }).then((response)=>{ this.getNotifications() });
        },
        resetForm()
        {
            this.notes  = null;
            this.symbol = null;
            this.source = null;
            this.preico = null;
        }
    }
});
