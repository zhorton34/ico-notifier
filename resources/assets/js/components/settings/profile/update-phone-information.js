Vue.component('update-phone-information', {
    props: ['user'],

    data() {
        return {
            form: new SparkForm({
                number: '',
                company: ''
            })
        };
    },

    mounted() {
        this.form.number  = this.spark.phone.number;
        this.form.company = this.spark.phone.company;
    },

    methods: {
        update() {
            Spark.put('/settings/profile/phone', this.form)
                .then(phone => {
                    console.log(phone);
                    this.spark.phone.number = phone.number;
                    this.spark.phone.company = phone.company;
                    this.spark.phone.completed = phone.completed;
                    Bus.$emit('updateUser');
                });
        }
    }
});